<?php
if(isset($_POST['Send'])){
	echo "<h1><u>Email</u></h1>";
$to=$_POST['to'];
$sub=$_POST['sub'];
$msg=$_POST['msg'];

?>

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
$email=$to;
$full_name="Daminda";
$mail->From = "dherath10@yahoo.com";
$mail->FromName = "Confirmation";
$mail->AddAddress("$email", "$full_name");
//$mail->AddAddress("ellen@example.com");        // name is optional
$mail->AddReplyTo("dherath10@yahoo.com", "Information");

$mail->WordWrap = 50;              // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");   // optional name
$mail->IsHTML(true);             // set email format to HTML

	$mail->Subject = $sub;
	$mail->Body    = "Hi <strong>$to, <br />
			Your Username - <br />
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

<?php
echo "To: ".$to."<br />";
echo "Subject: ".$sub."<br />";
echo "Message: ".$msg."<br />";

	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style2 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form name="up" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<table width="400" border="1" align="center">
  <tr>
    <td height="50" colspan="2" align="center"><h1>Send an Email</h1></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="150" height="50" class="style2">To</td>
    <td>
        <input type="email" name="to" id="to" required />    </td>
  </tr>
  <tr>
    <td height="50" class="style2">Subject</td>
    <td><input type="text" name="sub" id="sub" /></td>
  </tr>
  <tr>
    <td height="50" class="style2">Message</td>
    <td><label></label>
      <label>
      <textarea name="msg" id="msg" cols="45" rows="5"></textarea>
      </label></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center"><label>
      <input type="submit" name="Send" id="Send" value="Send" />
    </label></td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
</body>
</html>
<?php } ?>