<?php ob_start();
include 'classes.php';
session_start();
include "top.php";
?>
<html>
  <head>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
       <script src="js/main.js"></script>
    <style>
      body{
    height: 800px;
    overflow-x: hidden;
}
h5{
    position: relative;
    bottom:140px;
    left:590px;
    color : blue;
}
.online{
    background-color:#ffe8d2;
}
.online h1{
    color: white;
    font-size: 48px;
}
.head{
    position: relative;
    text-align: center;
    left:560px;
    top:20;
    transform: translate(-50%,-50%);
}
.form{
    position:relative;
    left:300px;
}

.icon{
    position: relative;
    top:15px;
    z-index:11111111;
}

    </style>
  </head>
<body>
<div class="online py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  <h1 class="head">Edit</h1>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                      <h4>Name</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" name="Name" value=<?php echo $_SESSION['client']->username; ?> >
                      <br>
                       <h4>Phone Number</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="number" value=<?php echo $_SESSION['client']->phonenumber; ?> name="Number">
                      <h4>Email</h4> 
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="mail" name="Email"value=<?php echo $_SESSION['client']->email; ?> ><br>
   
                      <h4>Address</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="Address" value="<?php echo $_SESSION['client']->address; ?>" ><br>
                      <h4>City</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="City" value=<?php echo $_SESSION['client']->city; ?> ><br>
                      <input type="submit"class="inputfile btn w-200 py-2" value="Submit" name="Submit">
                      <br>
                      <h3> <a href="resetpass.php"> Reset passworrd </a> </h3>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST["Submit"])){
  $invalid=true;

 if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
{
   if($invalid==true)
     {
         $x = new client();
     $result= $x->editprofile($_POST['Name'],$_POST['Email'],$_POST['Address'],$_POST['City'],$_POST['Number']);
     $_SESSION['client']->username=$_POST['Name'];
        $_SESSION['client']->address=$_POST['Address'];
     header("Location:home.php");
   }
}
else echo "<h5>*Email isn't in the correct format</h5>";

}

 ?>
