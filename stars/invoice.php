<?php
include 'classes.php'; 
session_start();
ob_start();
include "top.php";
 $sum=0;
$counter=0;
foreach($_SESSION['cart'] as $array){
    $counter++;
  }
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

body {
    background-color: #ffe8d2;
    font-family: 'Montserrat', sans-serif
}

.card {
    border: none
}

.logo {
    background-color: #eeeeeea8
}

.totals tr td {
    font-size: 13px
}

.footer {
    background-color: #eeeeeea8
}

.footer span {
    font-size: 12px
}

.product-qty span {
    font-size: 12px;
    color: #dedbdb
}
</style>
<!DOCTYPE html>


<body>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5"> <img src="images/v10_163.png" width="50"> </div>
                <div class="invoice p-5">
                    <h1>Order Confirmed!</h1> <span class="font-weight-bolder d-block mt-4 display-5">Hello <?php echo " " .$_SESSION['client']->username ?> </span> <span class ="h4">You order has been confirmed and will be shipped in next two days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span><p id="date"></p></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span> <span>MT12332345</span> </div>
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span><?php echo " " .$_SESSION['client']->address ?> </span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                   <?php
                        foreach($_SESSION['cart'] as $array){
                    ?>

                                    <td width="20%"> <img src= <?php echo $array['Image'];?> width="90"> </td>
                                    <td width="60%"> <span class="font-weight-bold"><?php echo $array['Product']."<br />";?></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:<?php echo $array['Quantity']."<br />";?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold"><?php echo $array['Price']."EGP"."<br />";?>  </span> 
                                         <?php $total=$array['Price']*$array['Quantity'];
                    ?>
                     </div>
                                    </td>
                                </tr>
                             
                                 <?php
                                
           $sum=$sum+$total;
        }

  ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Total</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span><?php echo $sum; echo " EGP";?></span> </div>
                                        </td>
                                        </tr>
                                        <tr>
                                      
                                        </tr>
                                        <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span><?php echo $sum; echo " EGP"?></span> </div>
                                        </td>
                                        </tr>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>You can check my orders page to track the current order status!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Stars Accessories</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Need Help? Contact us on WhatsApp</span> <span></span> </div>
            </div>
        </div>
    </div>
</div>
    <script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
    </script>
<?php
/*$_SESSION['cart']=array();*/
?>
</body>
</html>
<?php
ob_end_flush();
?>
