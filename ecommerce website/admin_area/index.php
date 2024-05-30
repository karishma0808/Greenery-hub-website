<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
    }
    .footer{
        position:absolute;
        bottom:0;
    }
    </style>
</head>
<body>
    <!-- navbar-->
    <div class="container-fluid p-0 ">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <img src="../image1/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="nav-item">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcom Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child-->
        <div class="row">
            <div class="col-md-12 bg-warning p-1 d-flex 
            align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../image1/admin1.jpg"
                    class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-success my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-dark bg-success my-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">View Categories</a></button>
                    <button><a href="index.php?insert_services" class="nav-link text-dark bg-success my-1">Insert Services</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">View Services</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-dark bg-success my-1">List Users</a></button><br>
                    <button><a href="" class="nav-link text-dark bg-success my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!--fourth child-->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_services'])){
                include('insert_services.php');
            }
            ?>
        </div>


        <!--last child-->
<div class="bg-success p-3 text-center footer">
  <p>All right reserved  ©-Desinged by karishma-2024</p>
</div>
  </div>
    </div>
    




<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
 integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
  crossorigin="anonymous"></script>
</body>
</html>