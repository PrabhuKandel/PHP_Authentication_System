
    

        <?php
        include("php/config.php");

        $errors = array();
        

        if(isset($_POST['submit'])) {
          
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];

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

            if ($password !== $confirmPassword) {
                $errors['confirm-password'] = "Passwords do not match.";
            }
            

            // If there are no errors, proceed with registration
            if(empty($errors)) {
                 
                    $hashedPassword = hash('sha256',$password);
                    mysqli_query($con, "INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age','$hashedPassword' )") or die('Error occurred');
                    header("Location:index.php"); 
                   
                   
                   
                }
           
      }



    require 'registration.php';
  ?>


