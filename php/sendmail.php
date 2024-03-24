<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include('config.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$otp = random_int(100000,999999);
$email =     $_SESSION['valid'];


try {

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kandelprabhu111@gmail.com';                     //SMTP username
    $mail->Password   = 'voymicyffyuhdydo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  
    $mail->setFrom('kandelprabhu111@gmail.com', 'Prabhu Kandel');
       //Add a recipient
    $mail->addAddress($email);               //Name is optional
    



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activation code';
    $mail->Body    = 'Your activation code is ' . $otp;


    $mail->send();
    echo 'Message has been sent';

   // insert otp in database
   
   
   mysqli_query($con, "UPDATE users
   SET otp = '$otp'
   WHERE email = '$email'") or die('Error occurred');

   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>