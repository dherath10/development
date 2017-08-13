<?php
require_once("class.phpmailer.php");
require_once("class.pop3.php");
require_once("class.smtp.php");

$mail = new PHPMailer();

$mail->IsSMTP();                  // set mailer to use SMTP
$mail->Host = "mail.myrakiyawa.com";     // specify main and backup server
$mail->SMTPAuth = true;              // turn on SMTP authentication
$mail->Username = "admin+myrakiyawa.com";         // SMTP username
$mail->Password = "rakiyawa1";                     // SMTP password
$email="dherath10@yahoo.com";
$full_name="Daminda";
$mail->From = "admin@myrakiyawa.com";
$mail->FromName = "Activation Code";
$mail->AddAddress("$email", "$full_name");
//$mail->AddAddress("ellen@example.com");        // name is optional
$mail->AddReplyTo("admin@myrakiyawa.com", "Information");

$mail->WordWrap = 50;              // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");   // optional name
$mail->IsHTML(true);             // set email format to HTML

	$mail->Subject = "Mail for activate your account";
	$mail->Body    = "Hi <strong>$full_name, <br />
			Your Username - $full_name <br />
			Your Password - ********** <br />
			Activation Code - <br />
			Activation Link - <a href='www.myrakiyawa.com/activate.php'>Activate</a>
			</strong>";
	$mail->AltBody = "Your Username - user_name
			Your Password - **********
			Activation Code - activation_code
			Activation Link - www.myrakiyawa.com/activate.php";
	if(!$mail->Send())
	{

		exit;
	}
?>