<?php
include ('../config/connect.php');
include('../pages/signup.php');
require '../config/vendor/phpmailer/src/Exception.php';
require '../config/vendor/phpmailer/src/PHPMailer.php';
require '../config/vendor/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<?php
session_start();
if(!empty($_SESSION['emailpass'])){

    $otpcode=rand(1000,9999);
        $mail = new PHPMailer(true);                            
            try {
                $emailuser=$_SESSION['user'];
                $email = $_SESSION['emailpass'];
                $subject = "ASK HABESHAN";
                    //$message = "<h1>Holla, <span style='color:#08c902';>$emailuser</span></h1><h2>Thank You For trying Ask habeshan.<br>Your Verification Code <h1 style='color:#08c902';>$otpcode</h1></h2>If you have any feedback on the project, I'm happy to hear it.<br>Contact Me on<br><a href='t.me/yon_aries'>Telegram</a><br>yonatandejene001@outlook.com";
                    $message = "<h1>Holla, <span style='color:#08c902';>$emailuser</span></h1><h2>Thank You For trying Ask habeshan.<br></h2>If you have any feedback on the project, I'm happy to hear it.<br>Contact Me on<br><a href='t.me/yon_aries'>Telegram</a><br>yonatandejene001@outlook.com";
                  //Server settings
                  $mail->isSMTP();                                     
                  $mail->Host = 'smtp.gmail.com';                      
                  $mail->SMTPAuth = true;                             
                  $mail->Username = 'askhabeshan.new@gmail.com';     
                  $mail->Password = '0921damon';             
                  $mail->SMTPOptions = array(
                      'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                      )
                  );                         
                  $mail->SMTPSecure = 'ssl';                           
                  $mail->Port = 465;                                   

                  //Send Email
                  $mail->setFrom('askhabeshan.new@gmail.com');

                  //Recipients
                  $mail->addAddress($email);              
                  $mail->addReplyTo('askhabeshan.new@gmail.com');

                  //Content
                  $mail->isHTML(true);                                  
                  $mail->Subject = $subject;
                  $mail->Body    = $message;

                  $mail->send();

                  $_SESSION['result'] = 'Message has been sent';
                  $_SESSION['status'] = 'ok';
                } catch (Exception $e) {
                    $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
                    $_SESSION['status'] = 'error';
                }
                
                $_SESSION['otpcode']=$otpcode;
                $_SESSION['emailpass']=$email;
                
            header("location:../pages/home.php");  
}
else {
    echo'OTP Failed!';
}
?>