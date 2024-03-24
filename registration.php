<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/style.css"/>
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="box form-box">
<header>Sign Up</header>

<form action="" method="post">
                  <div class="field input <?php if(isset($errors['username'])) echo 'error'; ?>">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" autocomplete="off"  value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>" />
                      <?php if(isset($errors['username'])) echo "<span class='error'>".$errors['username']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['email'])) echo 'error'; ?>">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" autocomplete="off" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>"/>
                      <?php if(isset($errors['email'])) echo "<span class='error'>".$errors['email']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['age'])) echo 'error'; ?>">
                      <label for="age">Age</label>
                      <input type="number" name="age" id="age" autocomplete="off" value="<?php echo isset($_POST['age']) ? $_POST['age'] : '';?>"/>
                      <?php if(isset($errors['age'])) echo "<span class='error'>".$errors['age']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['password'])) echo 'error'; ?>">
                      <label for="password">Password</label>
                      <div class="password-container">  <input type="password" name="password" id="password" autocomplete="off" />
                      <i class="fa-solid fa-eye" id="togglePassword"></i></div>
                      <?php if(isset($errors['password'])) echo "<span class='error'>".$errors['password']."</span>"; ?>
                  </div>
                  <div class="field input <?php if(isset($errors['confirm-password'])) echo 'error'; ?>">
                      <label for="confirm-password">Confirm Password</label>
                      <div class="password-container">  <input type="password" name="confirm-password" id="confirm-password" autocomplete="off" />
                      <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i></div>
                      <?php if(isset($errors['confirm-password'])) echo "<span class='error'>".$errors['confirm-password']."</span>"; ?>
                  </div>
      
                  <div class="field">
                      <input type="submit" class="btn" name="submit" value="Register" />
                  </div>
      
                  <div class="links">
                      Already a member? <a href="index.php">Sign In</a>
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

    const confirmPasswordInput = document.getElementById('confirm-password');
    const toggleConfirmPasswordButton = document.getElementById('toggleConfirmPassword');

    toggleConfirmPasswordButton.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
    });
});



</script>
</body>
</html>