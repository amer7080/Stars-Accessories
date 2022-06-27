<?php
include "classes.php";
session_start();
include 'top.php';?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
table,th,td,tr{
  border:1px solid #e3d18a;
}
th,td{
  padding: 15px;
  text-align: left;
}
th{
  background-color: #bf7154;
  color: white;
}
table{
  width: 100%;
  position:relative;
  
}
h3{
  text-align:center

}

h5{
       color:red;
       font-size:15x;

}
.details{
       font-size:20px;
}
.actions{
       color:black;
       
}
.button{
  position: relative;
  bottom: 35px;
  font-size: 1.25em;
  font-weight: 700;
  color: rgb(121, 117, 117);
  background-color: white;
  display: inline-block;
  cursor: pointer;
  border: 1px solid white;
  top:10px;
}

.button:focus,
.button:hover{
  background-color: rgb(121, 117, 117);
}
</style>
</head>

<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <table id="mytable">
    <tr>
      <th>Product Name</th>
      <th>Price</th> 
      <th>Category</th>
      <th>Image</th>
      <th>Edit</th>
       <th>Delete</th>
    </tr>

</body>               

<form action="addproduct.php">
</form><br>
<h3><input type = 'text' name = 'search' id='search2' placeholder="By product name" onkeyup='validate()'></h3>
<h3>Products</h3>
<div id ='msg'></div>

   
<?php
  
       $_SESSION['products']=new products();
$result =$_SESSION['products']->viewproducts(); 
  
  while($row=mysqli_fetch_array($result)) 
  {
         $_SESSION['products']->id=$row[0];
        $_SESSION['products']->name=$row[1];
           $_SESSION['products']->price=$row[2];
            $_SESSION['products']->image=$row[3];              
              $_SESSION['products']->category=$row[4];            
              echo"<tr>";
              echo" <td> " . $_SESSION['products']->name .  "</td>";
              echo " <td> " . $_SESSION['products']->price . "</td>";
              echo" <td>" . $_SESSION['products']->category . "</td>";
              
              
              ?>
             <td> <img src="<?php echo ($_SESSION['products']->image) ;?>" width=50px> </td>
              
             <td><span><a class="actions"href = "editproduct.php?X=<?php echo $row[0]; ?>"><i class='far fa-edit' style='font-size:24px'></i></a></span></td>            
              <td><span><a class="actions"href = "deleteproduct.php?X=<?php echo $row[0]; ?>"><i class='fas fa-trash' style='font-size:24px'></i>
</a></span></td>
          
             <?php 
              echo"</tr>";
            
            }
            echo"</table>";
          
            ?>
           
          </form>

      


          <script>
function validate(){

  var Table = document.getElementById("mytable");
Table.innerHTML = "";
    jQuery.ajax(
{
    url: 'manageproductsajax.php',
    data:'search2='+$("#search2").val() ,
    type: "POST",
    success:function(data){
$("#msg").html(data);
        }
        
        
});

}

</script>
<?php

 ob_end_flush(); 
?>
 </div>
</div>   
</div> 