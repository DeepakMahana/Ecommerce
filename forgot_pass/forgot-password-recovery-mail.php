<?
include ("../includes/db.php");
?>

<?php
   
require('class.phpmailer.php');
require('class.smtp.php');

$mail = new PHPMailer();

$emailBody = "<div>" . $user["customer_name"] . ",<br><br><p>Click on this Link to Reset Your Password for Your BookBerry Account<br><a href='" . "http://localhost/BookBerry/forgot_pass/reset_password.php?name=" . $user["customer_name"] . "'>" . "forgot_pass/reset_password.php?name=" . $user["customer_name"] . "</a><br><br></p>Regards,<br> Admin, <br> BookBerry Pvt Ltd, Ghatkopar(W)<br></div>";

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';


$mail->Username = "bookberrypvtltd@gmail.com";
$mail->Password = "bookberry123";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "bookberrypvtltd@gmail.com";
$mail->FromName = "Admin BookBerry Pvt Ltd";

$customer_email = $_POST["user-email"];
$mail->addAddress("$customer_email");

$mail->Subject = "Reset Your Password at BookBerry Pvt Ltd";
$mail->Body = "$emailBody";

if(!$mail->Send()){
    echo "<script>alert('Failed to Sent Reset Link ! Kindly Try Again')</script> <br />PHPMailer Error: " . $mail->ErrorInfo;
    echo "<script>window.open('index.php','_self')</script>";
}
else
{
    echo "<script>alert('Link To Reset Password Has Been Sent! Check Your Mail')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
?>
