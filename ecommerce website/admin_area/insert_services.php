<?php
include('../includes/connect.php');

if(isset($_POST['insert_services'])){
    $services_title = $_POST['services_title'];

    //select query from the database
    $select_query="select * from `services` where services_title='$services_title'";
    $result_select = mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('this category is present inside the database')</script>";
    }else{
    $insert_query = "INSERT INTO `services` (services_title) VALUES ('$services_title')";
    $result = mysqli_query($con, $insert_query);

    if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
    }
}}
?>
<h2 class="text-center">Insert Services</h2>
<form action=""method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receip"></i></span>
  <input type="text" class="form-control"name="services_title" placeholder="Insert Services"
   aria-label="services" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-success border-0 p-2 my-3"name="insert_services" value="Insert Services">
</div>
</form>