<?php

//To create the database connectivity
include "include/dbconnection.php";

//Get the email to change the password 
$email=$_POST['email'];

// To check whether the entered email is existing or not
$sqlemail="SELECT * FROM user WHERE Email='$email'";
$resultemail=mysqli_query($con,$sqlemail);
$no=mysqli_num_rows($resultemail);
$rowuser=mysqli_fetch_array($resultemail);

////////////////////////////
if($no==1){
$status="NotApproved";
$sql="INSERT INTO forgot_pwd VALUES('$email',curdate(),curtime(),'','$status')";
$result=mysqli_query($con,$sql);
$p=time(); //To genarate unique ID(Time ID) and consider as password
$pwd=md5($p); //$p = created Time ID , $pwd variable get the encrypted password
$sqlup="UPDATE user SET Password='$pwd' WHERE Email='$email'"; 
mysqli_query($con,$sqlup) or die(mysqli_query());


//To send an Email

require_once("class.phpmailer.php");
require_once("class.pop3.php");
require_once("class.smtp.php");

// User email address
$full=$rowuser['First_Name']." ".$rowuser['Last_Name'];//customer name
$mail = new PHPMailer();

$mail->IsSMTP();                  // set mailer to use SMTP
$mail->Host = "mail.myrakiyawa.com";     // specify main and backup server
$mail->SMTPAuth = true;              // turn on SMTP authentication
$mail->Username = "admin+myrakiyawa.com";         // SMTP username
$mail->Password = "rakiyawa1";                     // SMTP password
//$email="admin@wblms.com";
$full_name="$full";
$mail->From = "admin@wblms.com";
$mail->FromName = "Password Confirmation";
$mail->AddAddress("$email", "$full");
//$mail->AddAddress("ellen@example.com");        // name is optional
$mail->AddReplyTo("admin@wblms.com", "Password Confirmation");

$mail->WordWrap = 50;              // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");   // optional name
$mail->IsHTML(true);             // set email format to HTML


	$mail->Subject = "Password has been changed";
	$mail->Body    = " <strong>Your Name: $full <br />
			Your New Password: $p <br />
			Please change your password in next loging <br >
			
			</strong>";
	$mail->AltBody = "Your Name: $full";
			
	if(!$mail->Send())
	{

		$msg="Not Sending ".$p;
		header("Location:forgotPwd.php?id=$msg");
	}else{




if($result){

echo $msg="You have successfully entered your Email Address ($email)! Admin will send a new password to your Email";
header("Location:forgotPwd.php?id=$msg");

}
	}
} else {
	$msg="The entered Email Address does not exist";
	header("Location:forgotPwd.php?id=$msg");
}

?>

