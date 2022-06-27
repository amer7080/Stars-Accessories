<?php
include "classes.php";
session_start();
include 'top.php';?>
<html>
    <style>
 .hometxt{
    width: 573px;
  color: rgba(191,113,84,1);
  position: relative;
  top: 150;
  left: 25px;
  font-family: Rozha One;
  font-weight: Regular;
  font-size: 50px;
  opacity: 1;
  text-align: left;
 }
 .bar {
  width: 100%;
  height: 194px;
  background: rgba(191,113,84,1);
  position: relative;
  top: 437px;
  left: 0px;
  z-index: 111111111111111111;
}
.column {
  float: left;
  width: 23.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}
.browsepic1{
    margin-top: 12%;
    margin-left: 25px;
}
    </style>
<link href="css/home.css" rel="stylesheet"/>    
<body>
             <div> 
  <img class="mySlides"  src="images/carousel1.jpg" >
  <img  class="mySlides"src="images/carousel2.jpg" style="width:75% height:75%">
  <img class="mySlides" src="images/carousel3.jpg" style="width:75% height:75%">
  <img class="mySlides" src="images/carousel4.jpg" style="width:75% height:75%">
   
            </div>

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
<span class = "hometxt"> Our Latest Products </span>
    <div class="row">
    <div class= "bar">

        <div class="column">
        <img src="images/v10_71.png" alt="Snow" width=397px height=362px>
        <span class="pic1txt"> Gucci chouette 800 EGP</span>
    </div>
  <div class="column">
    <img src="images/v10_71.png" alt="Forest" width=397px height=362px>
    <span class="pic2txt">Valentino DCA 1200 EGP</span>
  </div>
  <div class="column">
    <img src="images/v10_71.png" alt="Mountains" width=397px height=362px>
    <span class="pic3txt">Prada elore 450 EGP</span>
  </div>
</div>
</div>

<span class = "hometxt"> Browse </span>
<div class="browsepic1"><img src="images/v16_35.png"width=748 height=668></div>



</body>
</html>