<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require '../../phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";

// optional
// used only when SMTP requires authentication  
$mail->SMTPAuth = true;
$mail->Username = 'occaso42@gmail.com';
$mail->Password = 'WC00klo96';


//Set who the message is to be sent from
$mail->setFrom('from@example.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('nicholas.dickel@education-siemens.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';


ob_start(); 
include 'articles_mail.html'; 
$inhalt = ob_get_contents(); 
ob_end_clean(); 

 $mail->IsHTML(true); //Versand im HTML-Format festlegen
$mail->Body=nl2br($inhalt);



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}




