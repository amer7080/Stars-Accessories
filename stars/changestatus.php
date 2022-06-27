<?php
 
include 'classes.php';
session_start();
$_SESSION['admin'] = new admin();

?>


<?php
$id=$_GET['X'];

$x = new admin();
$result= $x->changestatus($id);
if($result) 
      {
          header("Location:orders.php");
      }
      else{
        echo $sql;
      }





?>




<?php ob_end_flush(); ?>