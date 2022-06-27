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
body{
    background-color: #ffe8d2;
}

.card {
    font-size: 15px;
    margin: auto;
    width: 60%;
    max-width: 600px;
    padding: 4vh 0;
    box-shadow: 0 6px 20px 0;
    border-top: 3px solid #BF7154;
    border-bottom: 3px solid #BF7154;
    border-left: none;
    border-right: none;
    margin-bottom: 20px;
}

@media(max-width:768px) {
    .card {
        width: 90%
    }
}

.title {
    color: #BF7154;
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial
}

#details {
    font-weight: 400
}

.info {
    padding: 5% 8%
}

.info .col-5 {
    padding: 0
}

#heading {
    color: grey;
    line-height: 6vh
}

.pricing {
    background-color: #ddd3;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5
}

.pricing .col-3 {
    padding: 0
}

.total {
    padding: 2vh 8%;
    color: #BF7154;
    font-weight: bold
}

.total .col-3 {
    padding: 0
}

.footer {
    padding: 0 8%;
    font-size: x-small;
    color: black
}

.footer img {
    height: 5vh;
    opacity: 0.8;
}

.footer a {
    color: rgb(252, 103, 49)
}

.footer .col-10,
.col-2 {
    display: flex;
    padding: 3vh 0 0;
    align-items: center
}

.footer .row {
    margin: 0
}

#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: rgb(252, 103, 49);
    padding-left: 40px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: small;
    width: 29%;
    float: left;
    position: relative;
    font-weight: 400;
    color: rgb(160, 159, 159)
}

#progressbar #step1:before {
    content: "";
    color: rgb(252, 103, 49);
    width: 5px;
    height: 5px;
    margin-left: 0px !important
}

#progressbar #step2:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-left: 50%
}

#progressbar #step3:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 32%
}

#progressbar #step4:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 40px !important
}

#progressbar li:before {
    line-height: 19px;
    display: block;
    font-size: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh
}

#progressbar li:after {
    content: '';
    height: 2px;
    background: #ddd;
    position: absolute;
    float:center;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 1px;
    z-index: 1
}

.progress-track {
    padding: 8 8%
}

#progressbar li:nth-child(2):after {
    margin-right: auto
}

#progressbar li:nth-child(1):after {
    margin: auto
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%
}

#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%
}

#progressbar li.active {
    color: black
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #BF7154;
}
h1#null{

  margin-left: 720px;
  font-weight: bold;
}
</style>
<!DOCTYPE html>


<body>
<?php
 $x= new client();
$result = $x-> myOrders($_SESSION["client"]->id);
  $totalResult = mysqli_num_rows($result);
  if($totalResult>0)
  {
while($row=mysqli_fetch_array($result))
{
    $id=$row[0];

?>
<div class="card">
    <div class="title">Purchase Reciept</div>
    <div class="info">
        <div class="row">
            <div class="col-7"> <span id="heading">Date</span><br> <span id="details"><?php echo $row[5]?></span> </div>
    
        </div>
    </div>
    <div class="pricing">
        <div class="row">
            <?php
$result2= $x->getProduct($id);
  while($row2=mysqli_fetch_array($result2)){

            ?>
            <div class="col-9"> <span id="name"><?php echo $row2[1] ?></span> </div>
               
   
            <div class="col-3"> <span id="price"><?php echo $row2[2] ?>EGP</span> </div>
              <?php
             }
    ?>
        </div>
   
    </div>
    <div class="total">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3"><big><?php echo $row[2]?> EGP </big></div>
        </div>
    </div>
    <div class="tracking">
        <div class="title">Tracking Order</div>
    </div>
  
      <?php
      if ($row[4] == "Pending")
      {
        ?>
    <div class="progress-track">
        <ul id="progressbar">
        <li class="step0 active " id="step1">Ordered</li>
            <li class="step0 text-center" id="step2">Shipped</li>
          
            <li class="step0 text-right" id="step4">Delivered</li>
        </ul>
    </div>
    <?php
}
if ($row[4]=="Shipped")
{
    ?>
    <div class="progress-track">
        <ul id="progressbar">
        <li class="step0 active " id="step1">Ordered</li>
            <li class="step0 active text-center" id="step2">Shipped</li>
            <li class="step0  text-right" id="step4">Delivered</li>
        </ul>
    </div>
    <?php
}
if ($row[4]=="Delivered")
{
    ?>
    <div class="progress-track">
        <ul id="progressbar">
        <li class="step0 active " id="step1">Ordered</li>
            <li class="step0 active text-center" id="step2">Shipped</li>
            <li class="step0 active text-right" id="step4">Delivered</li>
        </ul>
    </div>
    <?php
}
?>

    <div class="footer">
        <div class="row">
            <div class="col-2"><img  src="images/v10_163.png"></div>
            <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
        </div>
    </div>
</div>
<?php
}
}
else{
    echo "<h1 id='null' > You haven't placed an order yet </h1>";
}
?>
</html>
