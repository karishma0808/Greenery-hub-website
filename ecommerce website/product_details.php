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
    <title>Ecommerce website using PHP and MySQL</title>
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
       <!-- <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping">cart</i><sup><?php 
          cart_item(); ?></sup></a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search here....."
         aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light"
        name="search_data_product">
      </form>
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
<div class="row px-1">
  <div class="col-md-10">
    <!--product-->
    <div class="row">

      <!--fetching products-->
      <?php
      // calling functions
      view_details();
      get_unique_categories();
      get_unique_services();
?>
<!-- row end-->
</div>
<!--col end-->
  </div>
  <div class="col-md-2 bg-success p-0">
    <!--side navebar-->
    <ul class="navbar-nav me-auto text-center">
      <!-- providing services-->
      <li class="nav-item bg-warning">
       <a href="#" class="nav-link"><h5><b>Providing Services</b></h5></a>
      </li>
      <?php
      getservices();
?>  
    </ul>

    <ul class="navbar-nav me-auto text-center">
      <!-- providing category-->
      <li class="nav-item bg-warning">
       <a href="#" class="nav-link"><h5><b>Categories</b></h5></a>
      </li>
      <?php
      getcategories();
?>
    </ul>
  </div>
</div>







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