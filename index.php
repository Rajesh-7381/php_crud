<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "./src/Exception.php";
require "./src/PHPMailer.php";
require "./src/SMTP.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dassagar754140@gmail.com'; //changes                     //SMTP username
    $mail->Password   = 'cbajlprpilckxyft';  // after 2 step verification password generate (changes)                             //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //changes            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dassagar754140@gmail.com', 'rajesh'); //changes
    $mail->addAddress('omprakash.sadangi@ajatus.co.in', 'omm'); //changes     //Add a recipient 
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('dassagar754140@gmail.com', 'rajesh'); //changes
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'php mailer';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; // changes if you want
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}