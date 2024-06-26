<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website-cart details</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
     rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
      crossorigin="anonymous">
    <!--front awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/
    all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCF
    kKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--/css file-->
    <link rel="stylesheet" href="style.css">
    <style>
      .cart_img{
    width:80px;
    height:80px;
    object-fit:contain;
}
      </style>
</head>
<body>
    <!--navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand -lg navbar-light bg-success">
  <div class="container-fluid">
  <img src="./image1/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">cart</i><sup><?php
          cart_item();?></sup></a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
<!--caling cart function-->
<?php
cart();
?>
<!-- second child-->
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <ul class="navbar-nav me-auto">
    <?php
    if(!isset($_SESSION['user_name'])){
      echo"  <li class='nav-item'>
      <a class='nav-link' href='#'><b>Welcome Guest</b></a>
      </li>";
    }else{
      echo"  <li class='nav-item'>
      <a class='nav-link' href='#'><b>Welcome ".$_SESSION['user_name']."</b></a>
      </li>";
    }
    if(!isset($_SESSION['user_name'])){
      echo"  <li class='nav-item'>
      <a class='nav-link' href='./users_area/user_login.php'><b>Login</b></a>
      </li>";
    }else{
      echo"  <li class='nav-item'>
      <a class='nav-link' href='./users_area/logout.php'><b>Logout</b></a>
      </li>";
    }
    ?>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
  <h5 class="text-center"><b>Great Offers</b></h5>
  <p class="text-center"><b>Nurture Your space with Our Beautiful Plants</b></p>
</div>

<!--fourth child-->

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
              <!-- php code for displaying dynamic data-->
              <?php
              $get_ip_add = getIPAddress();
              $total_price=0;
              $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo"<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";
              while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_products="Select * from `products` where product_id='$product_id'";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);//[500]
                  $total_price+=$product_values;//500
              ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" 
                    class="cart_img"></td>
                    <td><input type="text" name="qty"class="form-input w-50"></td>
                    <?php
$get_ip_add = getIPAddress();
if(isset($_POST['update_cart'])){
  $quantities=$_POST['qty'];
  $update_cart="update `cart_details` set quantity=$quantities where
  ip_address='$get_ip_add'";
  $result_products_quantity=mysqli_query($con,$update_cart);
  $total_price=$total_price*$quantities;
  }
                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo
                     $product_id ?>"></td>
                    <td>
                       <!--<button class="bg-warning px-3 py-2 border-0 mx-3">Update</button>-->
                       <input type="submit" value="Update Cart" class="bg-warning px-3 
                       py-2 border-0 mx-3" name="update_cart">
                       <!--<button class="bg-success px-3 py-2 border-0 mx-3">Remove</button>-->
                       <input type="submit" value="Remove Cart" class="bg-warning px-3 
                       py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>

                <?php
                }
              }}
              else{
                echo"<h2 class='text-center text-danger'> Cart is empty</h2>";
              }
                ?>
            </tbody>
        </table>
        <!--sub total-->
        <div class="d-flex mb-5">
          <?php
 
 $get_ip_add = getIPAddress();
 $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
 $result=mysqli_query($con,$cart_query);
 $result_count=mysqli_num_rows($result);
 if($result_count>0){
  echo " <h4 class='px-3'> Subtotal:<strong class='text-success'> $total_price/-
  </strong></h4>
  <input type='submit' value='Continue Shopping' class='bg-warning px-3 
   py-2 border-0 mx-3' name='continue_shopping'>
  <button class='bg-success p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
 }else{
  echo" <input type='submit' value='Remove Cart' class='bg-warning px-3 
  py-2 border-0 mx-3' name='continue_shopping'>";
 }

 if(isset($_POST['continue_shopping'])){
  echo"<script>window.open('index.php','_self')</script>";
 }
          ?>
           
        </div>
    </div>
</div>
            </form>

        <!-- function to remove item-->

<?php
function remove_cart_item(){
  global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
          echo $remove_id;
            $delete_query="DELETE  FROM `cart_details` WHERE product_id = $remove_id";
            $run_delete=mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

// Call the function to remove cart items
echo $remove_item=remove_cart_item();
?>

<!--last child-->
<!--include footer-->
<?php
include("./includes/footer.php")
?>
</div>
    

<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
 integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
  crossorigin="anonymous"></script>
    
</body>
</html>