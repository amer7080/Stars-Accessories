<?php 
include 'classes.php';
session_start();
$_SESSION['admin'] = new admin();
if($_SESSION['client']->role!=0){

    header("Location:outofreach.php");
  }
include "top.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title> Add Product</title>
    <link rel="stylesheet" href="css/editproduct.css">
</head>
<body>
    <div class="main">
      

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form"enctype="multipart/form-data">
                        <h2 id="create" class="form-title">Add a product</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="pname" id="username" placeholder="Product name"/>
                        </div>
                        <div class="form-group">
                            <select name="category" class="form-input" id="category" placeholder = "category">
  <option value="" selected disabled hidden >Product category</option>
  <option value="bags">Bags</option>
  <option value="glasses">Glasses</option>
  <option value="wallets">Wallets</option>
  <option value ="accessories"> Accessories</option>
</select>
                        </div>

                        <div class="form-group">

                            <input type="text" class="form-input" name="price" id="price" placeholder="Price"/>
                        </div>
                  
                        <div class="form-group">
                           <h3 > Choose an image </h3>
 <input type="file" style = "background-color: white;"class=" form-input" id="img" name="img" accept="image/*" >                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Add product" action="home.php"/>
                        </div>
                    </form>
                    <p class="loginhere">
        

                </div>
            </div>
        </section>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>



 <?php

if(isset($_POST["submit"]))
{
    if(empty($_POST['pname']) || empty($_POST['category']) || empty($_POST['price']))
    {
       echo "<h2  class='incorrect'>Missing fields</h2>";
       
    }
    else{
  $image=$_FILES['img']['name'];
 move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\stars\\" . $image);
 $x = new admin();
     $result= $x->insertproduct($_POST['pname'],$_POST['category'],$_POST['price'],$image);
}
}
?>
</body>
</html>
<?php
ob_end_flush();
?>