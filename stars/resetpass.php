<?php 
include 'classes.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stars";
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Sign In</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
<a href="home.php">
<img id="logo" src ="images/v10_163.png" style="width:128px;height:128px; position: relative; bottom: 100px; left: 10px;">
</a>
    <div class="main">
                       
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        
                        <h2 class="form-title"style="color:white">Reset password</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email Address"/>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                    <p class="loginhere"style="color:white">
                         ..
                    </p>
                </div>
            </div>
        </section>

    </div>

   
</body>
</html>
<script>
  
      $("#phonenumber").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^0-9_ ]/)) {
        e.preventDefault();
        alert(" You can't enter an alphabet in this field , Use '0-9'.");
       }
     });
   
    </script>
    <?php
$check=false;
if(isset($_POST["submit"]))
{ 
 $sql="SELECT * from accounts where email='".$_POST["email"]."'"; 
    $result = mysqli_query($conn,$sql); 
    if($row=mysqli_fetch_array($result))    
    {
        $check=true;
      
       
        
         ?>
                                
                       
              
                            <?php 
                              
                            }
                            else echo "<h2 class = 'incorrect'>*Incorrect E-mail</h2>";

}
if($check==true){

                            header('Location: forgot.php?X='.$_POST["email"]);
                        }

?>

<?php
ob_end_flush();
?>
