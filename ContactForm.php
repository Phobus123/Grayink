<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
<div>Hi 
<?php

require '/home/cheekin/PHPMailer-master/class.phpmailer.php';
require '/home/cheekin/PHPMailer-master/class.smtp.php';

$firstName = $_POST["FirstName"];
$email = $_POST["Email"];
$lastName = $_POST["LastName"];
$country = $_POST["Country"];
$mobileNo = $_POST["MobileNo"];
$company = $_POST["Company"];
$financeAdvisorOptionsChecked = "Finance Advisor: \r\n";
$businessAdvisorOptionsChecked = "Business Advisor: \r\n";
$strategicAdvisorOptionsChecked = "Strategic Advisor: \r\n";
$hearAbout = $_POST["hearAbout"];

if(!empty($_POST['FinanceAdvisor'])) {
    foreach($_POST['FinanceAdvisor'] as $optionFA) {
            $financeAdvisorOptionsChecked.= $optionFA."\r\n";
    }
}

if(!empty($_POST['BusinessAdvisor'])) {
    foreach($_POST['BusinessAdvisor'] as $optionBA) {
            $businessAdvisorOptionsChecked.= $optionBA."\r\n";
    }
}

if(!empty($_POST['StrategicAdvisor'])) {
    foreach($_POST['StrategicAdvisor'] as $optionSA) {
            $strategicAdvisorOptionsChecked.= $optionSA."\r\n";
    }
}

$msg = "Name: ".$firstName." ".$lastName."\r\n"."Email: ".$email."\r\n"."Country: ".$country."\r\n"."Company: ".$company."\r\n".$financeAdvisorOptionsChecked."\r\n".$businessAdvisorOptionsChecked."\r\n".$strategicAdvisorOptionsChecked;

$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sg2plcpnl0259.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'psyk@grayinkconsulting.com';                 // SMTP username
$mail->Password = 'Jojo2475';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('psyk@grayinkconsulting.com', 'Contact Form Enquiry Mailer');
$mail->addAddress('nohorserun@yahoo.com');     // Add a recipient
$mail->addAddress('sngyiekit@yahoo.com.sg');           // Name is optional

/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML*/

$mail->Subject = 'Contact Form Enquiry';
$mail->Body    = $msg;
/*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

if(!$mail->send()) 
{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	error_reporting(-1);
	ini_set('display_errors', 'On');
	set_error_handler("var_dump");
} 
	
else {
	echo " ".$firstName." ";
	echo 'Message has been sent. ';
}





?>
We'll contact you soon!
</div>
</body>
</html>