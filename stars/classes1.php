<?php
class DB {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "Shopping Cart EAV";
	public $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
}

class Product {
	public $id;
	public $name;
	public $image;
	public $price;
	public $options;
	function __construct($id) {
		$db_handle = new DB();
		$sql="SELECT * FROM product WHERE id=".$id;
		$product = mysql_query($conn,$sql)
		if ($id !="")
		{
			if ($row = mysqli_fetch_array($product))
			{
				$this->id=$row["id"];
				$this->name=$row["name"];
				$this->image=$row["image"];
				$this->price=$row["price"];
				$this->options= new productType($row["productType"]);
			}
		}

	}

	static function getAllProducts()	{
		$conn = mysqli_connect("localhost","root","","Shopping Cart EAV");
		$sql="select * FROM Product";
		$Type = mysqli_query($conn,$sql);
		$count=0;
		$output;
		while ($row = mysqli_fetch_array(Type))
		{
			$new= new Product($row["id"]);
			output[count]=$new;
			count=count+1;
		}
		return $output;

	}
}

class Cart{
	public $productsQuantity;

	function __construct(){
		$this->productsQuantity=array();
	}

	function addProduct($productID,$q){		
	/////////////complete////////////////////
	}

	function removeProduct($productID){
	/////////////complete////////////////////
	}

	function emptyCart(){
	/////////////complete////////////////////
	}
}

?>