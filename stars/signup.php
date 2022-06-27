<?php 
include 'classes.php';
session_start();
ob_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>

    <div class="main">
       <a class="back"href="home.php"> <img src="images/v10_163.png" alt="Logo" style="width:128px;height:128px; position: relative; bottom: 100px; left: 10px;"></a>

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="">
                        <h2 id="create" class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="phone number" class="form-input" name="phonenumber" id="phonenumber" placeholder="Phone Number"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Address"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="city" id="city" placeholder="City"/>

                        </div>
                        <div class="form-group">
                       <select name="question" class="form-input" id="question"  placeholder = "category">
  <option value="" selected disabled hidden >Security question</option>
  <option value="Where did you go to college?">Where did you go to college?</option>
  <option value="What was the name of your first pet?">What was the name of your first pet?</option>
  <option value="What was your childhood nickname?">What was your childhood nickname?</option>
  <option value ="In what city or town was your first job?"> In what city or town was your first job?</option>
</select>
</div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="answer" id="answer" placeholder="Answer"/>

                        </div>

                        <div class="form-group">
                            <input type="checkbox" checked="checked" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>By signing up, you agree to all statements in <a href="https://www.termsfeed.com/live/471266b5-2f7c-469c-93be-84f39705d98f" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" action="home.php"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="http://localhost/signin.php" class="loginhere-link">Login here</a>

                </div>
            </div>
        </section>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<script>
     $("#phonenumber").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^0-9_ ]/)) {
        e.preventDefault();
        alert(" You can't enter an alphabet in this field , Use '0-9'.");
       }
     });
  
     $("#username").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in this field. Use 'A-Z', 'a-z'");
       }
     });
   
    </script>
 <?php

if(isset($_POST["submit"]))
{

  $invalid=true;
  if(strlen($_POST["password"])<8)
  {
    $invalid=false;
  }
  else 
  {
    $checkUpper=true;
    for($i=0;$i<strlen($_POST["password"]);$i++)
    {
      if(ctype_upper($_POST['password'][$i]))
      {
        $checkUpper=false;
      }   
    }
  
    $checkNumeric=true;
    for($i=0;$i<strlen($_POST["password"]);$i++)
    {
      if(is_numeric($_POST['password'][$i]))
      {
        $checkNumeric=false;
      }
    }
  
    $checkSpecial=true;
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"]))
    {
      $checkSpecial=false;
    }
    if($checkSpecial==true||$checkNumeric==true||$checkUpper==true)
    {
      $invalid=false;
    }
  }
  
  if(empty($_POST['email'])||empty($_POST['password'])||empty($_POST['username'])||empty($_POST['address'])||empty($_POST['city']))
  {

   echo "<h2  class='incorrect'>Missing fields</h2>";
  }
  if((strlen($_POST['phonenumber']))<11 && (!empty($_POST['phonenumber'])))
  {

   echo "<h2  class='incorrect'>Phone number is not in the correct format</h2>";
  }

  else
  {
   
     if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
    {
      if($invalid==true)
      {
       
      
          $role=1;
         $x=new client();
         $hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
         $result= $x->signup($_POST['username'],$_POST['email'],$hash,$_POST['phonenumber'],$_POST['address'],$_POST['city'],$_POST['question'],$_POST['answer']);
         header("Location:signin.php");

         
        
        }
       
       
       
      else 
      {
        echo "<h2  class='incorrect'>Password should be atleast 8 chars in length & should contain <br> atleast 1 uppercase letter , 1 number , and one special character.</h2>";
      }
    }
    else
    {
      echo "<h2  class='incorrect'>Email isn't in the correct format.</h2>";
    } 
  }
}
?>
<?php
ob_end_flush();
?>