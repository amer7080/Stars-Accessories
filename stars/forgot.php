<?php 
include 'classes.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stars";
$conn = new mysqli($servername, $username, $password, $dbname);
 $sql="SELECT * from accounts where Email='".$_GET["X"]."'"; 
  $result = mysqli_query($conn,$sql);   
  if($row=mysqli_fetch_array($result))  
  { 
      $question=$row[8];
  }
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
                          <input type="text"class="form-input " disabled value="<?php echo $question;?>" name="Security question">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="answer" id="answer" placeholder="Your Answer"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" id="password" placeholder="Your New Password"/>
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

<?php
                      
                       if(isset($_POST["submit"]))
                       { 
                         if(!empty($_POST['Password'])&&!empty($_POST['answer'])){
                        if(strlen($_POST["Password"])>=8){   
                        $invalid=true;
                        }
                        else 
                        {
                          $checkUpper=true;
                          for($i=0;$i<strlen($_POST["Password"]);$i++)
                          {
                            if(ctype_upper($_POST['Password'][$i]))
                            {
                              $checkUpper=false;
                            }   
                          }
                        
                          $checkNumeric=true;
                          for($i=0;$i<strlen($_POST["Password"]);$i++)
                          {
                            if(is_numeric($_POST['Password'][$i]))
                            {
                              $checkNumeric=false;
                            }
                          }
                        
                          $checkSpecial=true;
                          if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["Password"]))
                          {
                            $checkSpecial=false;
                          }
                          if($checkSpecial==true||$checkNumeric==true||$checkUpper==true)
                          {
                            $invalid=false;
                          }
                        }
                            $sql="SELECT * from accounts where sAnswer='".$_POST["answer"]."' And sQuestion='$question'"; 
                       $result = mysqli_query($conn,$sql);  
             
                        if($row=mysqli_fetch_array($result))    {
                         
if($invalid==true){
    $hash=password_hash($_POST['Password'], PASSWORD_DEFAULT);
                           $sql ="UPDATE accounts SET Password='$hash' WHERE Email='".$_GET["X"]."'";
                           $result=mysqli_query($conn,$sql);
                           header("Location:signin.php");
}   else echo "<h2 class = 'incorrect'>*Password should be atleast 8 chars in length & should contain atleast 1 uppercase letter , 1 number , and one special char </h2>";
                 

                        }   else echo "<h2 class = 'incorrect'>*Incorrect Answer</h2>";
                      
                                                     
                                                    
                                                } else echo "<h2 class = 'incorrect'>*Missing fields</h2>"; 
                                            }
                       
                                          
               
                                              
                    
                             ?>

<?php
ob_end_flush();
?>
