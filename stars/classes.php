<?php

$_SESSION['cart']=array();
class user
{
  private $id;
  private $username ;
  private $password;
  private $email;
  private $phonenumber;
  private $role;
  private $address;
  public $conn;

  function create_connection()
  {
      $this->conn = new mysqli("localhost", "root", "", "stars");
      return $this->conn;
  }
}

class client extends user
{

  function signin($phonenumber,$password)
    {
      $this->create_connection();
   /*   $sql1="SELECT password from accounts where phonenumber='$phonenumber'";
      $result1=mysqli_query($this->conn,$sql1);
     $row = mysqli_fetch_array(mysqli_fetch_assoc($result1));
      $hash = $row['password'];    
      password_verify($password, $hash);*/
      $sql="SELECT * from accounts where phonenumber='$phonenumber'and password='$password'";
      $result=mysqli_query($this->conn,$sql);
  
      return $result;
    }
    function verify($password,$phonenumber)
    {
        $this->create_connection();
      $sql1="SELECT password from accounts where phonenumber='$phonenumber'";
      $result1 = mysqli_query($this->conn,$sql1);
     $row = $result1->fetch_assoc();
      $hash = $row['password'];    
     password_verify($password, $hash);
      return $result1;
    }
    function verify2($phonenumber)
    {
      $this->create_connection($phonenumber);
       $sql="SELECT password from accounts where phonenumber='$phonenumber'";
      $result=mysqli_query($this->conn,$sql);
      $row = $result->fetch_assoc();
      $hash=$row['password'];
      return $hash;
    }

    function signup($username,$email,$password,$phonenumber,$address,$city,$question,$answer)
{

    $conn=$this->create_connection();
   $sql= "SELECT * FROM accounts where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1)
    {
      echo "<h2  class='incorrect'>Email already exists</h2>";
    }
    else
    {
    $role=1;
    $sql="INSERT INTO accounts (username,email,password,phonenumber,role,address,city,sQuestion,sAnswer) values('$username','$email','$password','$phonenumber' ,'$role','$address','$city','$question','$answer')";
    $result = mysqli_query($conn,$sql);  
    return $result;
    }
   
}
 function editprofile($name,$email,$address,$city,$phonenumber)
    {
      $this->create_connection();
       $sql = "UPDATE `accounts` SET `email`='$email' , `username`='$name', `phonenumber`='$phonenumber',`address`='$address', `city`='$city' WHERE email = '$email' ";
         $result = mysqli_query($this->conn,$sql);
        header("Location:home.php");
     
    }
function myOrders($id)
{
  $this->create_connection();
  $sql="SELECT * from orders WHERE CID='$id' ORDER BY ID DESC " ;
      $result=mysqli_query($this->conn,$sql);
      return $result;
}
function getProduct($id)
{
  $this->create_connection();
  $sql="SELECT * from orderedproducts WHERE OID='$id'";
  $result=mysqli_query($this->conn,$sql);
  return $result;
}



  
}


class admin extends user
{

    function signin($username,$password)
    {
      $this->create_connection();
      $sql="SELECT * from accounts where username='$username'and password='$password'";
      $result=mysqli_query($this->conn,$sql);
      return $result;
    }


   function insertproduct($name,$category,$price,$image)
   {
    $this->create_connection();
    $sql="INSERT into products (name,category,price,image) values('$name','$category','$price','$image')";
    $result=mysqli_query($this->conn,$sql);
    return mysqli_insert_id($this->conn);
   }

      function deleteproduct($id)
    {
      $this->create_connection();
      $sql = "DELETE FROM products where id = $id";
      $result = mysqli_query($this->conn,$sql);
      return $result;
      if($result) 
      {
          header("Location:manageproducts.php");
      }
      else{
        echo $sql;
      }
    }

    function editproducts($name,$category,$price,$image)
    {
      $this->create_connection();
      $sql = "UPDATE `products` SET `name` = '$name',`category` = '$category', `price` = '$price', `image` = '$image' WHERE
       id='".$_GET['X']."'";
      $result = mysqli_query($this->conn,$sql);
    }

    
    function displayclients()
   {
     $this->create_connection();
     $sql = "SELECT * FROM accounts" ;
     $result=mysqli_query($this->conn,$sql);
     $this->close_connection();
     return $result;
   }
   function changestatus($id)
   {
$this->create_connection();
$status = "Shipped";
 $sql = "UPDATE `orders` SET `status` = '$status' WHERE id='$id'";
 $result=mysqli_query($this->conn,$sql);;
return $result;
   }
    function changestatus2($id)
   {
$this->create_connection();
$status = "Delivered";
 $sql = "UPDATE `orders` SET `status` = '$status' WHERE id='$id'";
 $result=mysqli_query($this->conn,$sql);;
return $result;
   }

 function changelatestproducts(){
    $conn=$this->create_connection();
    $sql = "SELECT * FROM products ORDER BY ID DESC";
    $result = mysqli_query($conn,$sql);
    return $result;
  }
  function getOrders(){
    $conn=$this->create_connection();
  $sql="SELECT * from orders";
    $result = mysqli_query($conn,$sql);
    return $result;

  }
  function ajaxOrders($key)
  {$conn=$this->create_connection();
  $sql="SELECT * FROM orders where ID LIKE '%".$key."%' OR Number LIKE '%".$key."%'";
    $result = mysqli_query($conn,$sql);
    return $result;
   
  }

 function getProducts($id){

$conn=$this->create_connection();
   $sql="SELECT Product from orderedproducts WHERE OID='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
 }
 function getQuantity($id){
$conn=$this->create_connection();
   $sql="SELECT Quantity from orderedproducts WHERE OID='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
 } 
  function getPrice($id){
$conn=$this->create_connection();
   $sql="SELECT Price from orderedproducts WHERE OID='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
 } 
 function getName($id){
  $conn=$this->create_connection();
   $sql="SELECT name from products WHERE ID='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;

 }


}


class products
{
  public $id;
  public $name;
  public $price;
  public $image;
  public $category;
  public $conn;
  function create_connection()
  {
    $this->conn = new mysqli("localhost", "root", "", "stars");
    return $this->conn;
  }

  function viewproducts()
  {
    
    $conn=$this->create_connection();
    $sql="SELECT * from products";
    $result = mysqli_query($conn,$sql);  
    return $result;

  }
  function viewcategory($cat)
  {
    
    $conn=$this->create_connection();
    $sql="SELECT * from products where category LIKE '%". $cat ."%' or name LIKE  '%". $cat ."%'"; 
    $result = mysqli_query($conn,$sql);  
    return $result;

  }
     function searchAjax($key)
    {
      $conn=$this->create_connection();
      $sql="SELECT * FROM products where Name LIKE '%". $key ."%'"; 
      $result = mysqli_query($conn,$sql);
      return $result;
    }
    
}

class orders
{
  function create_connection()
  {
      $this->conn = new mysqli("localhost", "root", "", "stars");
      return $this->conn;
  }
    function checkout($CID,$total,$number)
{
    $conn=$this->create_connection();
    $status = "Pending";
    $sql="INSERT INTO orders (CID,Total,Number,Status,date) values ('$CID','$total','$number','$status',now())";
    $result = mysqli_query($conn,$sql); 
    $newest_id = mysqli_insert_id($conn);
    return $newest_id;
  

}
function checkout2($oid,$name,$quantity,$price)
{
    $conn=$this->create_connection();
    $sql="INSERT INTO orderedproducts(OID,Product,Quantity,Price) values ('$oid','$name','$quantity','$price')";
    $result=mysqli_query($conn,$sql);
    //header("Location:products.php");

}
function addItem($name,$price,$quantity,$id)
{

    array_push($_SESSION['cart'],array("Product"=>$name,"Price"=>$price,"Quantity"=>$quantity,"ID"=>$id));
    header("Location:cart.php");



}

}