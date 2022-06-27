<?php 
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.topnav{
width:100%;
height:130px;
color:black;
background-color: #FFF9F2;
font-size: 10px;
}
.topnav a{
  height:140px;
  color:grey;
  padding-left: 60px;
 padding-bottom: 10px;
 bottom:15px;
  font-size: 20px;
}
.searchbar input[type="text"] { 
  float: top;
  padding-left: 5px;
  margin-top: 0px;
  margin-right: 0px;
  font-size: 20px;
   border-radius:13px;
  border-color: black;
}
img#logo{
height:130px;
width:130px;
border: none;
}
.searchbar{
  padding-left: 150px;

}
.welcometxt{
  color:grey;
  font-size: 20px;
  padding-left: 20px;
  top:-20px;
  font-weight: bold;

}
img#cart{
  width:45px;
  height:35px;
  border:none;

}
.topnav a#cartlink{
  position: relative;
}
.header{background:rgb(0, 178, 255);color:#fff;}
#lblCartCount {
    font-size: 20px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: 110px;
    margin-top:52px;
}
.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#sign{
  position: absolute;
  top: 1.5%;
  left: 70%;

}
.cart2{
   position: absolute;
  top: 8%;
  left: 70%;
}
.float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:20px;
    right:20px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
  font-size:30px;
    box-shadow: 2px 2px 3px #999;
  z-index:100;
}
#icon{
  height:30px;
}
a#search2{
  height:20px;
  width:20px;
  margin-left: -50px;
}

.my-float{
    margin-top:16px;
}
</style>
<body>
  <a href="https://api.whatsapp.com/send?phone=01142027770&text=Hello, Dear SA Client! Feel free to contact us if you have any inquires, We're glad to help you! ♡ " class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<div class ="topnav">
<?php if(!empty($_SESSION['client']) && $_SESSION['client']->role == 1) { 
             ?>
<img id="logo" src ="images/v10_163.png">
<a href= "home.php"> Home </a>
<a href= "products.php"> Shop</a>

<a href="myorders.php"> My orders </a>
<a href="editprofile.php"> Edit profile </a>

    
<span id ="sign">
<span class = welcometxt  >Welcome <?php echo $_SESSION["client"]->username;?></span>
 <a href= "signout.php" style="font-weight:bold;"  > Sign Out </a> 
</span>


<span class = "searchbar">
      <input type="text" placeholder="Search.." name="gsearch" id = "gsearch"  >
   <a id="search2" href ="javascript:openPage()">    <i class="fa fa-search" "  ></i> </a>
</span>
<?php
$counter=0;
foreach($_SESSION['cart'] as $array){
    $counter++;
}
?>
<span class="cart2">
<a href= "cart.php" id = "cartlink"> 
  
<img alt="cart" id ="cart" src="images/cartlogo2.png">
</span>
<?php
if(!empty($_SESSION['cart']) )
{
  ?>
<span class='badge badge-warning' id='lblCartCount'> <?php echo $counter ?></span>
<?php
}
?>
</a>

 <?php }else if(!empty($_SESSION['client']) && $_SESSION['client']->role == 0) { 
             ?>
<img id="logo" src ="images/v10_163.png">
<a href= "addproduct.php"> Add Product </a>
<a href= "orders.php"> View Orders</a>
<a href= "manageproducts.php"> Manage products</a>
<a href="editprofile.php"> Edit profile </a>
<span id ="sign" style="" >
<span class = welcometxt >Welcome <?php echo $_SESSION["client"]->username;?></span>
</span>
<a href= "signout.php"> Sign Out </a>


 <?php }else{?>
  <img id="logo" src ="images/v10_163.png">
<a href= "home.php"> Home </a>
<a href= "products.php"> Shop</a>

<span class = "searchbar">
      <input type="text" placeholder="Search.." name="gsearch" id = "gsearch"  >
   <a id="search2" href ="javascript:openPage()">    <i class="fa fa-search" "  ></i> </a>
       <a href="signin.php">Sign In</a>
    <a  href="signup.php">Sign Up</a>
 </span>
 <?php } ?>
  </div>

  <script>

openPage = function() {
  var key=document.getElementById("gsearch").value;
location.href = "products.php?filter="+key;
}
</script>
 </script>
	</body>