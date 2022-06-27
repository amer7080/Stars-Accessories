
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <?php
  include "classes.php";
  ob_start();
  session_start();
  include 'top.php';

?>
<style>
body{

}
.toptext{
	font-family: copperplate;
	font-size:40px;
	font-weight:bold;
	padding-left:650px;
	color:#BF7154;
   text-decoration: underline;

}
.sidenav{
	margin-top: -1%;
	position: absolute;
    height:auto;
    width:170px;
    font-size: 20px;
    font-weight: bold;

}
h5#name{
  font-size: 20px;
  font-weight: bold;
}
h5#price{
  font-size:20px;
  font-weight:bold;
  color:#BF7154;
}
.sidetxt{
color:#BF7154;
  padding-bottom: 30px;
  font-weight: lighter;
}
.btnAddAction
{
background-color: #C4C4C4;
border: 2px solid #FFF9F2;
}
.details{
  height:30px;
  width:110px;
 border-radius:13px;
 background-color:light-gray;
}


img{
	width:300px;
	height:300px;
	object-fit: cover;
	 border: 3px solid #BF7154;
}
a
{
  color:#BF7154;
}	
a:hover
{
  color:#BF7154;
}
.zoom {
  transition: transform 3s; 

}
.zoom:active {
  transform: scale(1.7); 
}
#search{
  width:120px;
}

</style>
<

<div class = "sidenav">


 
<p> Product categories </p> <br>
<p class = "sidetxt" > <a href="?filter=glasses">-Sun glasses</a> </p>
<p class = "sidetxt"> <a href="?filter=bags">-Women bags</a> </p>
<p class = "sidetxt"> <a href="?filter=wallets">-Wallets</a> </p>
<p class = "sidetxt"> <a href="?filter=accessories">-Accessories</a> </p>

</div>

<?php
ob_start();
$_SESSION['products']=new products();
$_SESSION['orders']=new orders();


$items=array();
       $counter=0;
 if(!isset($_GET['filter']))
 {
$result =$_SESSION['products']->searchAjax($_POST['search3']);
}
else if (isset($_GET['filter']))
{
  $result =$_SESSION['products']->viewcategory($_GET['filter']);
}




  
while($row=mysqli_fetch_array($result)) 
{
       
         $_SESSION['products']->id=$row[0];
          $_SESSION['products']->name=$row[1];
          $_SESSION['products']->price=$row[2];
          $_SESSION['products']->image=$row[3];
?>

       <div class="container" >  
       	<div class ="row">
       		<div class ="col-md-4" style="border-right-style: inset; border-color:#BF7154;">
       			<form method="post" action ="">
              <div class="zoom">
                     <img src=<?php echo ($_SESSION['products']->image) ?>  >
                   </div>
                     <h5 id = "name"> Name : <?php echo ($_SESSION['products']->name)?> </h5>
                      <h5 id = "price"> Price : <?php echo ($_SESSION['products']->price)?> EGP </h5>
                      <div class="cart-action">
                     <button type="button" class="px-3 py-2 border-right" onClick="dec();">-</button>
                        <input type="text" class="product-quantity" id="counter" name="quantity" readonly value=1 size="4" />  
                         <span>
                        
                          <button type="button" class="px-3 py-2 border-left" onClick="inc();">+</button>
                          <button class="details" name="add" value=<?php echo $counter; ?>>Add to cart</button>
 <?php 
                        array_push($items,array("Product"=>$_SESSION['products']->name,"Price"=>$_SESSION['products']->price ,"Image"=>$_SESSION['products']->image, "ID"=>$counter));
                        $counter++; ?>

                      </span><br> 

                      </div>
                        
                  </form>
                     </div>
             <script>
function inc(){
var counter=document.getElementById("counter").value;
counter++;
document.getElementById("counter").value=counter;

}
function dec(){
  var counter=document.getElementById("counter").value;
  if(counter>1){
counter--;
  }
document.getElementById("counter").value=counter;



}

             </script>
          
              <?php
 } 

 ?>
 </div>
  </div>
  <?php
  if(isset($_POST["add"])){
         $count=$_POST["add"];
$items[$count]["Quantity"]=$_POST["quantity"];
       array_push($_SESSION['cart'],$items[$count]);
    header("Location:products.php");
       }

   if(isset($_POST["add"]) && empty($_SESSION['client']) ){
       header("Location:signin.php");
      
}
 
  ?>

<?php
 ob_end_flush(); 
include "footer.php";

?>
