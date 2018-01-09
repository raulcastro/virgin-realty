<?php

/*$from_add = "redes@florafaunaycultura.org"; 

$to_add = "redes@florafaunaycultura.org";

if (isset($_POST['form-type'])) {
	switch ($_POST['form-type']){
		case 'contact':
			$subject = 'Nuevo mensaje desde FFCM';
			break;
		case 'subscribe':
			$subject = 'Suscribci&oacute;n para Newsletter FFCM';
			break;
		default:
			$subject = 'Nuevo mensaje desde FFCM';
			break;
	}
}else{
	die('MF004');
}

$headers = "From: $from_add \r\n";
$headers .= "Reply-To: $from_add \r\n";
$headers .= "Return-Path: $from_add\r\n";
$headers .= "BCC: raul@wheretogo.com.mx\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$message    = ' '
            . ' Nombre: <strong>'.$_POST['name']. '</strong> <br />'
            . ' Telefono: <strong>'.$_POST['phone'] . '</strong> <br />'
            . ' Emaiql: <strong>'.$_POST['email'] . '</strong> <br />'
            . ' Message: <strong>'.$_POST['message']. '</strong> '
        ;

//$message    = 'test ';
if (isset($_POST)) {
	if(mail($to_add,$subject,$message,$headers)) {
	    // echo 'Message could not be sent.';
	    // echo 'Mailer Error: ';
	    echo 'success';
	} else {
	    echo 'fail';
}
}


// Pear Mail Library
require_once "Mail.php";

$from = '<redes@florafaunaycultura.org>';
$to = '<redes@florafaunaycultura.org>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you -- eh?";

$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
		'host' => 'ssl://smtp.gmail.com',
		'port' => '465',
		'auth' => true,
		'username' => 'raul.castro.developer@gmail.com',
		'password' => 'cas8867ca'
));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
	echo('<p>' . $mail->getMessage() . '</p>');
} else {
	echo('<p>Message successfully sent!</p>');
}
*/

date_default_timezone_set('America/Toronto');

require './phpmailer/PHPMailerAutoload.php';
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "gdssdh";
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "raul@wheretogo.com.mx";  // GMAIL username
$mail->Password   = "huevos2014";            // GMAIL password

$mail->SetFrom('redes@florafaunaycultura.org', 'PRSPS');

//$mail->AddReplyTo("user2@gmail.com', 'First Last");

$mail->Subject    = "PRSPS password";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "sistemas@greca.mx";
$mail->AddAddress($address);

if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}