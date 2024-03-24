<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
<?php
 include('php/config.php');


 if(isset($_POST['submit']))
 {


  $email = mysqli_real_escape_string($con, $_POST["email"]);
  $password = mysqli_real_escape_string($con, $_POST["password"]);
  $hashedPassword = hash('sha256',$password);
  $result = mysqli_query($con, "SELECT * FROM  users WHERE email='$email' AND password='$hashedPassword'");
  $row = mysqli_fetch_assoc($result);

  if(is_array($row) &&!empty($row))
   {
    
    $_SESSION['valid'] = $row['Email'];
    

    $_SESSION['username'] = $row['Username'];
    $_SESSION['age'] = $row['Age'];
    $_SESSION['id'] = $row['Id'];
    header("Location:verify.php");
    include('php/sendmail.php');
  }
  else
  {


    $error = "Incorrect email or password";
  }

  
 }


?>


<?php if(!empty($error)): ?>
            <div class='message'>
                <p><?php echo $error; ?></p>
            </div><br>
        <?php endif; ?>
        <header>Login</header>
    
        <form action="" method="post">
          <div class="field input">
            <label for="email">Email</label>
            <input
              type="text"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <div class="password-container">
            <input
              type="password"
              name="password"
              id="password"
              autocomplete="off"
              required
            />
            <i class="fa-solid fa-eye" id="togglePassword"></i>
            
            </div>
     
          </div>

          <div class="field">
            
            <input
              type="submit"
              class="btn"
              name="submit"
              value="Login"
              required
            />
          </div>
          <div class="links">
            Don't have account? <a href="register.php">Sign Up Now</a>
          </div>
        </form>
      </div>
    
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
  
   

    
  const passwordInput = document.getElementById('password');
  const togglePasswordButton = document.getElementById('togglePassword');

  togglePasswordButton.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
  });
});
    </script>
  </body>
</html>
