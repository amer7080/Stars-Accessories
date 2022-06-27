 
 <head>
 <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Rozha+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
        body{
            overflow-x:hidden;
            overflow-y:hidden;
            background-color:rgba(191,113,84,0.1);
        }
        table,th,td,tr{
            border:1px solid #e3d18a; 
            
            padding-right: 50px;
         }
        th,td{
            padding: 225px;
            text-align: left;
        }

        .cart-items th{
            width:90%;
            padding-right:40px; 
               font-size:20px;
               text-indent: 10px;
            background-color: #bf7154;
            color: white;
        }
          .cart-total th{
            padding-right:40px; 
               font-size:20px;
               text-indent: 10px;
            background-color: #bf7154;
            color: white;
        }


        .counter{
            color:#e3d18a;
        }
        .sub,.total{
            color:#e3d18a;
        }

        .cart-items{
            width: 80%;
            position: relative;
            left:-40px;
        }
        .cart-total{
            position: relative;
            left:230px;
        }
        .checkout{
            width:220px;
            height:50px;
            border:1px solid #e3d18a;
            border-radius:15px;
            background-color: #bf7154;
            cursor: pointer;
            position:relative;
            left:110px;
            margin-top:20px;
        }
        .checkout:hover{
            background-color:rgba(191,113,84,0.8);
            color:white; 
        }
        .checkouts{
            width:220px;
            height:50px;
            border:1px solid #e3d18a;
            border-radius:15px;
            background-color: #bf7154;
            cursor: pointer;
            position:relative;
            left:220px;
            top: 20px;
            margin-top:20px;
        }
        .checkouts:hover{
            background-color:rgba(191,113,84,0.8);
            color:white; 
        }
        .cart{
            position: absolute;
            left:150px;
        }
        .cart-heading{
            position: relative;
            left:110px;
            color:#433520;
        }
         .layer{
position: relative;
width: 1050px;
height: 1050px;
left: 300px;
top: 50px;

background: #FFF9F2;
border-radius: 103px;
z-index: 3;
}
.layer1{
position: relative;
width: 1191px;
height: 500px;
left: 220px;
top: -900px;

background: #BF7154;
border-radius: 83px;
z-index:0;
}
h1#shop{

text-align: center;
width: 1024px;
height: 121px;
left: 208px;
top: 434px;
color:#BF7154;
font-size: 96px;
line-height: 91.2px;
font-family:Rozha One;
font-weight: 400;


}
img{
    height:100px;
    width:150px;
}

    </style>

<?php

include 'classes.php'; 
session_start();
ob_start();
include "top.php";

$counter=0;
foreach($_SESSION['cart'] as $array){
    $counter++;
}
$discount=0.1;
?>
<div class = "layer">
<h1 id="shop"> Shopping Cart </h1>

 <div class="cart">
             <h1 class="cart-heading">You have <span class="counter"><?php echo $counter?></span> products in your cart</h1><br>
             <?php 
             if($counter > 0)
             {
              ?>
                <table class="cart-items">
                    <thead>
                        <tr>
                    <th> # </th>
                            <th>Product </th>
                            <th>Price </th>
                            <th>Quantity </th>    
                            <th>Subtotal </th>
                            <th>Select</th>
                        
                        </tr>
                    </thead>
                    <?php 
                     $sum=0;
                     $item=0;
                     ?>
                     <form action="" method="post">
                     <?php
                        foreach($_SESSION['cart'] as $array){
                    ?>
                <tr>
                    <td> <img src = <?php echo $array['Image'];?>> </td>
                    <td><?php echo $array['Product']."<br />";?></td>
                    <td><?php echo $array['Price']."<br />";?></td>
                    <td>  <?php echo $array['Quantity'];;?> 
 </td>
                    <?php $total=$array['Price']*$array['Quantity'];
                    ?>
                    <td><?php echo $total; echo " EGP";
                    $sum=$sum+$total;
                    ?></td>
                    <td><input type="checkbox" value="<?php echo $item; ?>" name="check[ ]"></td>
                </tr>
            <?php
            $item++;
        }

  ?>
 </table>


 <input type="submit"  name="delete" class="checkouts" value="Remove item(s)">
 </form><br>
   <br>
                <table class="cart-total"><br>
                   <br>
                   <form action="" method="post">
                    <tr>
                        <th>Total</th>
                        <td class="total"><?php echo $sum; echo " EGP"?></td>
                        </tr>
                       


                  
                    
                </table>

                <input type="submit"  name="submit" class="checkout" value="Check Out"onclick="return confirm('Are you sure?')"  >
                <input type="submit"  name="reset" class="checkout" value="Reset">
                </form>
                             <?php
}
?>
            </div> 
        </div>
        </div>
            </div>
       </div>
       <div class="layer1">
   </div>
  </body>
</html>
<?php

if(isset($_POST["submit"])){
  echo $_SESSION['client']->id;
  echo $_SESSION['client']->phonenumber;
   $newest_id= $_SESSION['orders']->checkout($_SESSION['client']->id,$sum,$_SESSION['client']->phonenumber);
   foreach($_SESSION['cart'] as $array){
       $_SESSION['orders']->checkout2( $newest_id,$array['Product'],$array['Quantity'],$array['Price']);
       header("Location:invoice.php");
      
   

}



}
if(isset($_POST["delete"])){
 
    
 for ($i=0; $i<count($_POST['check']);$i++) { 
     $remove_id=$_POST['check']["$i"];
     array_splice($_SESSION["cart"], $remove_id, 1);

 }
 header("Location:cart.php");
}
if(isset($_POST["reset"])){
 $_SESSION['cart']=array();
 header("Location:cart.php");
}

?>

  </script>
<?php
ob_end_flush();
?>
