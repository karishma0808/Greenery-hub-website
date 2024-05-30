<?php

//including connect file
//include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;
     // conditionto check isset or not
     if(!isset($_GET['category'])){
     if(!isset($_GET['services'])){
$select_query = "Select * FROM `products` ORDER BY RAND() LIMIT 0,9";
    $result_query = mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $services_id=$row['services_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/product_images/$product_image1'
      class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id'
       class='btn btn-success'>View more</a>
  </div>
</div>
</div>";
}
}
}
}



//getting all products
function get_all_products(){
    global $con;
    // conditionto check isset or not
    if(!isset($_GET['category']) && !isset($_GET['services'])){
$select_query = "Select * FROM `products` ORDER BY RAND()";
   $result_query = mysqli_query($con, $select_query);
   while($row=mysqli_fetch_assoc($result_query)){
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_image1=$row['product_image1'];
     $product_price=$row['product_price'];
     $category_id=$row['category_id'];
     $services_id=$row['services_id'];
     echo "<div class='col-md-4 mb-2'>
     <div class='card'>
     <img src='./admin_area/product_images/$product_image1'
     class='card-img-top' alt='$product_title'>
     <div class='card-body'>
     <h5 class='card-title'>$product_title</h5>
     <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/-</p>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id'
       class='btn btn-success'>View more</a>
 </div>
</div>
</div>";
}
}
}


//getting unique categories
function get_unique_categories(){
    global $con;
        
        // condition to check isset or not
        if(isset($_GET['category'])){
            $category_id = mysqli_real_escape_string($con, $_GET['category']);
            $select_query = "Select * FROM `products` where category_id = $category_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows== 0){
                echo "<h2 class='text-center text-danger'>This category is not available for cart</h2>";
           }
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $services_id=$row['services_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                <img src='./admin_area/product_images/$product_image1'
                class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price:$product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'
       class='btn btn-success'>View more</a>
            </div>
          </div>
          </div>";
            
          }
          }
          }
          

//getting unique services
function get_unique_services(){
    global $con;
    
    // condition to check isset or not
    if(isset($_GET['services'])){
        $services_id = $_GET['services'];
        $select_query = "Select * FROM `products` where services_id = $services_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>This services is not avaiable right now!!</h2>";
        }

        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $services_id=$row['services_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='./admin_area/product_images/$product_image1'
            class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price:$product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id'
       class='btn btn-success'>View more</a>
        </div>
      </div>
      </div>";
        
      }
      }
    }



    //displaying services in sidenav
    function getservices(){
        global $con;
        $select_services = "SELECT * FROM `services`";
    $result_services = mysqli_query($con, $select_services);
    
    while ($row_data = mysqli_fetch_assoc($result_services)) {
        $services_id = $row_data['services_id'];
        $services_title = $row_data['services_title'];
    
        echo "<li class='nav-item'>
        <a href='index.php?services=$services_id' class='nav-link text-light'>$services_title</a></li>";
    }}

    //displaying categories in sidenav
    function getcategories(){
    global $con;
    $select_categories = "SELECT * FROM `categories`";
$result_categories = mysqli_query($con, $select_categories);

while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_id = $row_data['category_id'];
    $category_title = $row_data['category_title'];

    echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
}}

//searching products function

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
$search_query="Select* from `products` where product_keyword like
'%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
        }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $services_id=$row['services_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/product_images/$product_image1'
      class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id'
       class='btn btn-success'>View more</a>
  </div>
</div>
</div>";
}
}
}

//view details function
function view_details(){
  global $con;
  // conditionto check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
    if(!isset($_GET['services'])){
      $product_id=$_GET['product_id'];
    $select_query="Select * from `products` where product_id=$product_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2']; 
      $product_image3 = $row['product_image3'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $services_id=$row['services_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
                  <img src='./admin_area/product_images/$product_image1'
                  class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price:$product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                  <a href='index.php' class='btn btn-success'>Go home</a>
                  </div>
       </div>
      </div>
      
      <div class='col-md-8'>
        <!--realted images-->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center mb-5 text-success'>Related Product</h4>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image2'
      class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image3'
      class='card-img-top' alt='$product_title'>    
            </div>
        </div>
    </div>";
  }
}
  }
}
}
//get ip address functions
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

//cart function
//(there is a problem in getaddress)
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where 
    ip_address='$get_ip_add' and product_id=$get_product_id";
     $result_query=mysqli_query($con,$select_query);
     $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside cart')
            </script>";
            echo"<script>window.open('index.php','_self')</script>";
}else{
  $insert_query="insert into `cart_details` (product_id,
  ip_address, quantity) values($get_product_id,'$get_ip_add',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo"<script>alert('Item is added to cart')</script>";
  echo"<script>window.open('index.php','_self')</script>";

}
}
}

//function to get card item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
     $result_query=mysqli_query($con,$select_query);
     $count_cart_items = mysqli_num_rows($result_query);
}else{
  global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
     $result_query=mysqli_query($con,$select_query);
     $count_cart_items = mysqli_num_rows($result_query);

echo $count_cart_items;
}

//total price function
function total_cart_price(){
  global $con;
  $get_ip_add = getIPAddress();
  $total_price=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);//[200,300]
      $product_values=array_sum($product_price);//[500]
      $total_price+=$product_values;//500
    }
  }
  echo $total_price;
}

}
?>