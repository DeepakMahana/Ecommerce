<?php
include ("../includes/db.php");
?>



<?php   
require('class.phpmailer.php');
require('class.smtp.php');

$mail = new PHPMailer();

$emailBody = "
			<p>
			
			Hello dear <b style='color:blue;'>$user</b> you have ordered some products on our website BookBerry.com, Please find your order details, Your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from BookBerry.com</h2></td></tr>
					
					<tr align='center'>
						<th><b>S.N</b></th>
						<th><b>Product Name</b></th>
						<th><b>Quantity</b></th>
						<th><b>Paid Amount</th></th>
						<th>Invoice No</th>
					</tr>
					
					<tr align='center'>
						<td>1</td>
						<td>$pro_name</td>
						<td>$qty</td>
						<td>$amount</td>
						<td>$invoice</td>
					</tr>
			
				</table>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='http://localhost/BookBerry/index.php'>Click here</a> To Login to your account</h2>
				
				<h3> Thank you for your order @ - www.BookBerry.com</h3>
				
			
			
			";

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

$customer_email = $_SESSION["customer_email"];
$mail->addAddress("$customer_email");

$mail->Subject = "Your Order Details From BookBerry Pvt Ltd";
$mail->Body = "$emailBody";

if(!$mail->Send()){
    echo "<script>alert('Payment Successfull !! Check Your Mail For Order Details')</script> <br />PHPMailer Error: " . $mail->ErrorInfo;
    echo "<script>window.open('http://localhost/BookBerry/index.php','_self')</script>";
}
?>
