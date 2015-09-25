<? 
session_start();
require_once('includes/config.php');

$title = $_POST['subject']; 
include("header.php"); 

require("phpmailer/class.phpmailer.php");

$errors = "";

$_SESSION['ec_Organization'] = $_POST['Organization'];
$_SESSION['ec_Address'] = $_POST['Address'];
$_SESSION['ec_City'] = $_POST['City'];
$_SESSION['ec_State'] = $_POST['State'];
$_SESSION['ec_Zip'] = $_POST['Zip'];
$_SESSION['ec_Contact_Name'] = $_POST['Contact_Name'];
$_SESSION['ec_Title'] = $_POST['Title'];
$_SESSION['ec_Phone'] = $_POST['Phone'];
$_SESSION['ec_Email'] = $_POST['Email'];
$code = strtolower($_POST['code']);
$security_code = strtolower($_POST['security_code']);

$_SESSION['ec_Question'] = stripslashes($_POST['Question']);


if ($_POST['Contact_Name'] == "")
	$errors .= "Must enter Contact_Name.<br>";
if ($_POST['Email'] == "")
	$errors .= "Must enter Email.<br>";

if ($security_code !== $code){
		$errors = $errors."Incorrect Captcha<br>";
}
if (eregi("\r",$_POST['Contact_Name']) or eregi("\n",$_POST['Contact_Name']))
     die("Why ?? :(");
if (eregi("\r",$_POST['Email']) or eregi("\n",$_POST['Email']))
     die("Why ?? :(");

if ($errors == "")
	{
	
	$mail = new PHPMailer();

	$mail->Sender = "info@".$domain;
	$mail->From = "info@".$domain;
	$mail->FromName = $_POST['Contact_Name'];
	$mail->AddReplyTo($_POST['Email']);
	$mail->Subject = "Website Inquiry: ".$_POST['subject'];
	
	$mail->AddAddress($contact_email);
	//$mail->AddBCC("test@viethconsulting.com");
	
	$msg = "

Contact Name: ".$_POST['Contact_Name'];

if ($_POST['Organization'] <> "")
	{
	$msg .= "
Organization: ".$_POST['Organization'];
	}
	
if ($_POST['City'] <> "" OR $_POST['Address'] <> "")
	{
$msg .= "
Address: 
".$_POST['Address']."
".$_POST['City'].", ".$_POST['State']." ".$_POST['ZIP'];
	}
$msg .= "
Phone: ".$_POST['Phone']."
Email: ".$_POST['Email']."

Question: 
".stripslashes($_POST['Question'])."
	
	";
	
	$mail->Body = $msg;
	
	$mail->Send();
	
	echo "<br><br><b>Thank You!</b><br><Br><Br>";
	echo "Your request has been sent to ".$org_name.".<br><Br><Br><Br>"; 
	}
else
	{
	echo "<b>Error!</b><br><br>";
	echo $errors; 
	}
//echo message here...


include("footer.php"); 
?>