	
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// require 'vendor/autoload.php';
	function sendOTP($email,$otp) {
		
	
		$message_body = "<div >
		<div style='background-color:#088178;width:50%; justify-content:center;align-item:center; display:flex;margin-left:25%'>
			<div>
			<h1 style='font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-weight:700;font-size:40px;color:white;'>Welcome To  </h1>
			</div>
		</div>
		<div style='position: relative; border:1px solid rgb(202, 200, 200); height:400px; width:50%;margin-left:25%'>
		<h1 style='font-size: 25px; font-family:sans-serif;margin-top:5%;margin-left:34%;'>~<em> &nbsp Cara Shopping &nbsp </em>~</h1>
			<p style='font-size: 20px; font-family:sans-serif;margin-top:15%;margin-left:25%;'> One Time PIN is: $otp, and is valid for 1 minute.</p>
			<p style='font-size: 15px; font-family:sans-serif;margin-top:20%;margin-left:25%;'> This is an auto-generated email. Do not reply to this email.</p>
	
		</div>
	</div>" ;
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure ='ssl'; // tls or ssl
		$mail->Port     = '465';
		// $mail->Username = 'YOUR GMAIL ACCOUNT';
		// $mail->Password = "APP PASSWORD IN GMAIL";
		$mail->Host     = "smtp.gmail.com";
		$mail->SetFrom("contact.cara.shopping@gmail.com", "support.cara-shopping.com");
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	}
?>
