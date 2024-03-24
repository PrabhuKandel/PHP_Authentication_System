<?php

session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
 header("Location: index.php");
}

?>
<?php
 include('php/config.php');
 $error= '';


 if(isset($_POST['submit']))
 {

  $otp = $_POST['otp'];
  $validEmail = mysqli_real_escape_string($con, $_SESSION['valid']);
  

  $result = mysqli_query($con, "SELECT otp FROM  users WHERE email='$validEmail' ");
  $row = mysqli_fetch_assoc($result);

  if(is_array($row) &&!empty($row))
   {
    

    if($otp===$row['otp'])
    {
      header("Location:home.php");
      exit;
    }
    else{
      $error = "Invalid OTP";

    }

  }
  

 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login system</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>

  <body>
    <div class="container">
      <div class="box form-box">
<form action="" method="post">
          <div class="field input">
            <label for="otp">Enter OTP</label>
            <?php if(!empty($error)): ?>
            <div class='message'>
                <p><?php echo $error; ?></p>
            </div><br>
        <?php endif; ?>
            <input
              type="text"
              name="otp"
              id="otp"
              autocomplete="off"
              required
            />
          </div>

         
          <div class="field">
            <input
              type="submit"
              class="btn"
              name="submit"
              value="Verify"
              required
            />
          </div>
          <div class="links">
                     <a href="index.php">Go back</a>
                  </div>
        
        </form>
</div>
</div>
