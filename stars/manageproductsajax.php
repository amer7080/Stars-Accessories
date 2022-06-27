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
  background-color: #bf7154; 
  color: white;
}
table{
  width: 100%;
  position:relative;

}

</style>
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
<?php
ob_start();
include "classes.php";
session_start();
      $_SESSION['products']=new products();
$result =$_SESSION['products']->searchAjax($_POST['search2']); 
   
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
              echo" <td>" . $_SESSION['products']->category . "</td>";;
              
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
          </div>
</div>   
</div> 