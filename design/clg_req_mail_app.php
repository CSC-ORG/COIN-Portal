<?php
$account="shaadimagic8@gmail.com";//put your email and password
$password="26august94";
if(!isset($to))$to="goyals1993@gmail.com";
$from="shaadimagic8@gmail.com";
$from_name="Shaadi Magic team";
$msg="Here is the auto generated password use this to login into your account using your email and password.<br>".$password_new; // HTML message
$subject="CSC College sign in Username And Password";
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
//$mail->SMTPSecure = 'tls';     //new
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);
echo"bbcvcvc";
if(!$mail->send()){
 //echo "Mailer Error: ";
 $m=$mail->ErrorInfo;
}else{
 //echo "E-Mail has been sent";
 $m="emailsent";
}
header("location:admin_home.php");
?>