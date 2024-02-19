<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/style.css"/>
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="box form-box">

        <?php
        include("php/config.php");

        $errors = array();
        

        if(isset($_POST['submit'])) {
          
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // Validation
            if(empty($username)) {
                $errors['username'] = "Username is required";
            }
            if(empty($email)) {
                $errors['email'] = "Email is required";
            } elseif(!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                $errors['email'] = "Invalid email format";
            }
            else{

              $verify_query = mysqli_query($con,  "SELECT Email FROM users WHERE Email='$email'");
              if(mysqli_num_rows($verify_query) != 0) {
                 
                $errors['email'] = "Email already exists";     
                 
              }
            }
            if(empty($age)) {
                $errors['age'] = "Age is required";
            } elseif(!is_numeric($age) || $age <= 0) {
                $errors['age'] = "Age must be a valid positive number";
            }
            if(empty($password)) {
                $errors['password'] = "Password is required";
            } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*]{8,}$/", $password)) {
                $errors['password'] = " Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter,one special character and one number";
            }

            // If there are no errors, proceed with registration
            if(empty($errors)) {
                 
                    $hashedPassword = hash('sha256',$password);
                    mysqli_query($con, "INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age','$hashedPassword' )") or die('Error occurred');
                    header("Location:index.php?registration_success=1");
                   
                   
                   
                }
            
            else if ($errors) {

            //   var_dump($errors);
        
              require 'registration.php';
              ?>
          </div>
          <?php 
            } 
      }
else
{
  
  ?>

  <?php
    require 'registration.php';
  ?>
</div>
<?php
}
?>

</div>       
</body>
</html>