<?php
include 'classes.php'; 
session_start();
ob_start();
include "top.php";  

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

h1
{
font-size: 40px;
font-family: Rozha One;
font-weight: Regular;
color: rgba(191,113,84,1);
text-align: center;
}
h2
{
font-size: 25px;
font-family: Rozha One;
font-weight: Regular;
color: rgba(161,85,54,1);
text-align: center;
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
                    <h1>Congratulations! You've become a premium member for completing 3 orders! </h1><hr> <br><br>  <h2>You've earned a 10% voucher to enjoy on your next order!</h2> <hr> <br><br> <span class ="h4"> Complete another 2 orders to become an elite member and earn a 15% voucher!</span>            
                    </div>
                    
                  
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
