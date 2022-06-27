 <?php
  include "classes.php";
  session_start();
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
  background-color: #BF7154;
  color: white;
}
table{
  width: 80%;
  position:relative;
  left:140px;
  top:10px;
}
.actions{
  color:green;
}

</style>
<body>
  <table>
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
ob_start();
$x = new admin();
  $result = $x->ajaxOrders($_POST['search2']);

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
echo"<td>$row[4]</td>";

?>
 <td><span><a class="actions"href = "changestatus.php?X=<?php echo $row[0]; ?>">Set as delivered</a></span>
 <br>
  <span><a class="actions"href = "changestatus2.php?X=<?php echo $row[0]; ?>">Set as Delivered</a></span>
 </td>
<?php 
echo"</tr>";
}
echo"</table>";
?>
