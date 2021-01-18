<?php
session_start();

$random_number=rand(100000,999999);
$_SESSION["otpset"] = $random_number;
$mail_id=$_POST['email_id'];
$mail_content="hi sir/ma'am,\nYour OTP(One Time Password) is :".$random_number."\n Warm Regards" ;
// echo $mail_content;
//include required phpmailer files
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
// define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//create intance of phpmailer
$mail = new PHPMailer();
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
// set type of enryption
$mail->SMTPSecure = "tls";
//set port to connect smtp
$mail->Port = "587";
//set gmail username
$mail->Username = "stuti.negi0513@gmail.com";
//set gmail password
$mail->Password = "08302902242";
//set email subject
$mail->Subject = "just to check";
//set sender email
$mail->setFrom("stuti.negi0513@gmail.com");
//email body
$mail->Body =$mail_content;
//add recipient
$mail->addAddress($mail_id);
//finally send email
if($mail->send())
{
    echo "Mail sent";
}
else{
    echo "error occured";
}
//closing smtp connection
$mail->smtpClose();
// }
?>