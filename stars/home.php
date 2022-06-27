<?php
include "classes.php";
session_start();
include 'top.php';
$x = new admin();
$result = $x->changelatestproducts();
$arr = array();
while($row=mysqli_fetch_array($result)) 
{$name =$row[1];
$img= $row[3];
$price=$row[2];
array_push($arr,$name,$img,$price);
}
?>
<html>
<link href="css/home2.css" rel="stylesheet"/>   

<body>
    <div class="v23_34">
        <div class="v9_3">
    <img class="mySlides" src="images/carousel1.jpg">
    <img  class="mySlides"src="images/carousel2.jpg">
    <img class="mySlides" src="images/carousel3.jpg">
    <img class="mySlides" src="images/carousel4.jpg">
                <div class="10_20">
                    <div class="9_5">
                    </div>
                </div>
        </div>
    </div>    
    <div class="shopnowdiv"><a href="products.php"></div>
                <span class="shopnow">Shop now</span></a>

<div class="v10_23">
    <div class="v10_27"></div>
    <div class="name"></div>
    <div class="v10_69">               
            <div class="v10_72"><img src=<?php echo($arr[4]) ?> width=397px height=362px></div>        
    </div>
    <div class="pic"><img src=<?php echo($arr[1]) ?>  width=397px height=362px></div>
    <div class="v10_145">
            <div class="v10_147"><img src=<?php echo($arr[7]) ?>  width=397px height=362px></div>
            <div class="v10_158"></div>
    </div>
    <span class="v16_50">Our latest Products</span>
</div>

<div class="v16_17">
    <div class="v16_32">
        <div class="v16_33"></div>
        <div class="v16_34"></div>
        <div class="v16_35"><img src="images/v16_35.png"width=748 height=668></div>
        <div class="v16_40">
            <div class="v16_39"><a href="products.php?filter=bags"></div>
            <span class="v10_67">Bags</span>
        </div>
    </div>
    <div class="v16_41">
        <div class="v16_23">
            <div class="v16_24"></div>
            <div class="v16_25"><img src="images/v16_28.png"width=348 height=340></div>
        </div>
            <div class="v23_33">
                <div class="v16_42"><a href="products.php?filter=wallets"></div>
                <span class="v16_43">Wallets</span></a>
            </div>
        </div>
        <div class="v16_44">
            <div class="v16_18">
                <div class="v16_19"></div>
                <div class="v16_20"><img src="images/v16_22.png"width=348 height=340>   </div>
            </div>
            <div class="v16_45"><a href="products.php?filter=glasses"></div>
            <span class="v16_46">Sun Glasses</span></a>
        </div>
        <span class="v16_49">Browse</span>
    </div>
    <span class="v23_28"><?php echo($arr[0] . " " . $arr[2] . "EGP"  ) ?></span>
        <span class="v23_29"><?php echo($arr[3] . " " . $arr[5] . "EGP"  ) ?></span>
            <span class="v23_31"><?php echo($arr[6] . " " . $arr[8] . "EGP"  ) ?></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<?php include "footer.php";?>


<script type='text/javascript'>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1
    }    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>