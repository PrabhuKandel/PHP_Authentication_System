<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid']))
{

  header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Home</title>
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <p><a href="home.php">Home</a></p>
      </div>

      <div class="right-links">
        <?php
  $id = $_SESSION['id'];

  $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
  while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_Age = $result['Age'];
    $res_Id = $result['Id'];


  }
  echo "<a href='edit.php?Id=$res_Id'>Change profile</a>"


?>
        <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
      </div>
    </div>
    <main>
      <div class="main-box top">
        <div class="top">
          <div class="box">
            <p>Hello <b><?php echo $res_Uname ?></b>, Welcome to home page</p>
          </div>
          
        </div>
        </div>
      
    </main>
</div>
  </body>
</html>
