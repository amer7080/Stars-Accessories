  <?php
  include "classes.php";
  session_start();
  if($_SESSION['client']->role!=0){

    header("Location:outofreach.php");
  }

?>
<style>
table,th,td,tr{
  border:1px solid #e3d18a;
  position:relative;
}
th,td{
  padding: 15px;
  text-align: left;
}
th{
  height:40px;
  background-color: #BF7154;
  color: white;
  text-align-last: center;
}
table{
  width: 80%;
  position:relative;
  left:140px;
  top:10px;
}
td{
  text-align-last: center;
}
h3{
  left:400px;
position:relative;

}
.actions{
  color:green;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
ob_start();
include "top.php";


?>
<h3> Search for an order : </h3>
<h3><input type = 'text' name = 'search2' id='search2' placeholder="By order ID or Phone Number" onkeyup='validate()'></h3>

<h3>This tables shows all the records found in database:</h3>
<div id ='msg'></div>


<script>
function validate(){

  var Table = document.getElementById("mytable");
Table.innerHTML = "";
    jQuery.ajax(
{
    url: 'ordersajax.php',
    data:'search2='+$("#search2").val() ,
    type: "POST",
    success:function(data){
$("#msg").html(data);
        }
        
        
});

}

</script>
</head>


<body>
  <table id="mytable">
    <tr>
      <th>Order ID</th>
      <th>Number</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Amount</th>
      <th> Status </th>
      <th> Change status </th>
    </tr>
</body> 

<?php 

 $x = new admin();
  $result = $x->getOrders();

   

while($row=mysqli_fetch_array($result))
{
  echo"<tr>";
  echo" <td>$row[0]</td>";
  echo" <td>$row[3]</td>";

  $id=$row[0];
  $result2 = $x->getProducts($id);
echo "<td>";
  while($row2=mysqli_fetch_array($result2)){
    echo"$row2[0]";
   echo "<br>";
  

  } 
  
  echo "</td>";
  echo "</td>";
 $result3 = $x->getQuantity($id); 
  echo "<td>";
  while($row2=mysqli_fetch_array($result3)){
    echo"$row2[0]";
   echo "<br>";
  

  } 
  echo "</td>";
$result3 = $x->getPrice($id); 
  echo "<td>";
  while($row2=mysqli_fetch_array($result3)){
    echo"$row2[0]";
    echo "<br>";

  

  } 
  echo "</td>";
  echo"<td>$row[2]</td>";
    echo" <td>$row[4]</td>";
?>
 <td><span><a class="actions"href = "changestatus.php?X=<?php echo $row[0]; ?>">Set as Shipped</a></span>
  <br>
  <span><a class="actions"href = "changestatus2.php?X=<?php echo $row[0]; ?>">Set as Delivered</a></span>


 </td>

 <?php 
  echo"</tr>";
}
echo"</table>";

?>
