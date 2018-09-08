<?php
if(isset($_POST['email'])){
    if(!empty($_POST['email'])){
        error_reporting(E_ERROR | E_PARSE);
// require_once 'mailerClass/class.php';
 require_once 'mailerClass/PHPMailerAutoload.php';
 
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'mail.creative-era.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 25;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "youremail@yourdomain.com";

//Password to use for SMTP authentication
$mail->Password = "8h+Uc3TI}0d&";

//Set who the message is to be sent from
$mail->setFrom('youremail@yourdomain.com', 'Creative Era');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('youremail@yourdomain.com', 'Creative Era');

//Set the subject line
$mail->Subject = 'Loop [Newsletter]';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$newsemail = $_POST['email'];
$mail->Body = $newsemail.'<br><p>Subscribed for Newsletter</p>';

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo 'success';
$nEmail = $_POST['news'];
$newline = '
';
// $file = fopen("emaillist.txt","w+");
$text = $nEmail.$newline;
// fputs($file,$text,FILE_APPEND);
// fclose($file);

$file = 'emaillist.txt';
$write = $text;
file_put_contents($file,$write,FILE_APPEND);
}
    }
}
?>