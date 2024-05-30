<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_services = $_POST['product_services'];
    $product_price = $_POST['product_price'];
    $products_status = 'true';

    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if (
        $product_title == '' ||
        $product_description == '' ||
        $product_keyword == '' ||
        $product_category == '' ||
        $product_services == '' ||
        $product_price == '' ||
        $product_image1 == ''||
        $product_image2 == ''||
        $product_image3 == ''
    )
    {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description,
         product_keyword, category_id, services_id, product_image1, product_image2,product_image3,product_price, date, status) VALUES
          ('$product_title', '$product_description', '$product_keyword', '$product_category', '$product_services',
           '$product_image1','$product_image2','$product_image3', '$product_price', NOW(), '$products_status')";
        $result_query = mysqli_query($con, $insert_products);

        if ($result_query) {
            echo "<script>alert('Product successfully inserted')</script>";
        }
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
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
<body class="bg-warning">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">
                <b>Product title</b></label>
                <input type="text" name="product_title"
                id="product_title" class="form-control "
                placeholder="Enter product title" autocomplete="off"
                required="required">
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-lable">
                <b>Product description</b></label>
                <input type="text" name="product_description"
                id="product_description" class="form-control "
                placeholder="Enter product description" autocomplete="off"
                required="required">
            </div>
            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-lable">
                <b>Product keyword</b></label>
                <input type="text" name="product_keyword"
                id="product_keyword" class="form-control "
                placeholder="Enter product keyword" autocomplete="off"
                required="required">
            </div>
            <!--categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id=""class="form-select">
                    <option value="">Select a category</option>
                    <?php
                      $select_query = "SELECT * FROM `categories`";
                      $result_query = mysqli_query($con, $select_query);
                      while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                      }
                     ?>
                </select>
            </div>
            <!--services-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_services" id=""class="form-select">
                    <option value="">Select a services</option>
                    <?php
                      $select_query = "SELECT * FROM `services`";
                      $result_query = mysqli_query($con, $select_query);
                      while ($row= mysqli_fetch_assoc($result_query)) {
                        $services_title = $row['services_title'];
                        $services_id = $row['services_id'];
                        echo "<option value='$services_id'>$services_title</option>";
                      }
                     ?>
                </select>
            </div>
            <!--image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-lable">
                <b>Product image1</b></label>
                <input type="file" name="product_image1"
                id="product_image1" class="form-control"
                required="required">
            </div>
            <!--image2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-lable">
                <b>Product image2</b></label>
                <input type="file" name="product_image2"
                id="product_image2" class="form-control"
                required="required">
            </div>
            <!--image3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-lable">
                <b>Product image3</b></label>
                <input type="file" name="product_image3"
                id="product_image3" class="form-control"
                required="required">
            </div>
            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">
                <b>Product price</b></label>
                <input type="text" name="product_price"
                id="product_price" class="form-control "
                placeholder="Enter product price" autocomplete="off"
                required="required">
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product"
                 class="btn btn-success mb-3 px-3"value="insert product">
            </div>
            
        </form>
    </div>
    
</body>
</html>