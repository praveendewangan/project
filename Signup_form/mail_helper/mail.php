<?php
function send_code($code,$email)
{

        $to = $email.",er.praveendewangan@gmail.com";
        $subject = "Received Your Query!";

        
        $message = '
        <html>
        <head>
        <title>Welcome to Murali Group of Companies</title>
        </head>
        <body>
        <div style="width: 80%;border: 2px solid black;border-radius: 8px;margin-left: 10%;" align="center">
        <div style="width: 100%;background-color: wheat;padding-bottom: 1%;border-radius: 5px;">
        <a href="http://www.joinmuraliworld.com/"><img style="margin-top: 1%;" src="http://www.joinmuraliworld.com/theme/frontend/images/logo.jpg" alt="LOGO"></a>
        </div>
        <p>Hi, '.$code.'</p>
        <p style="font-size: 1.5em;font-weight: bold;">Welcome to Murali Group of Companies</p>
        <p style="font-size: 1.5em;font-style: italic;">Your Query is</p>
        <p style="font-size: 1.5em;font-weight: bold;">"We will get back to you soon. Thank-you!"</p>
        <p style="background-color: wheat;margin: 0px;border-radius: 5px;padding-bottom: 0%;padding-bottom:2px;padding-top:2px"><i>This is an auto generated mail, Please do not reply to this mail</i> <br />
        <i>For any queries please contact us at 7803052842</i></p>
        </div>
        </body>
        </html>
        ';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: "Praveen" <er.praveendewangan@gmail.com>' . "\r\n";
$headers .= 'Cc: er.praveendewangan@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);


// ########################################3
//require 'PHPMailer/PHPMailerAutoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
/* #####################################
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp1.example.com;smtp2.example.com'; 
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'er.praveendewangan@gmail.com';                 // SMTP username
    $mail->Password = 'Prav!n96';                           // SMTP password
 //   $mail->SMTPSecure = 'tls';                      
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 587;
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('er.praveendewangan@gmail.com', 'Praveen');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation Code';
    $mail->Body    = 'Thankyou for joining. You confirmation code is ..'.$code.'</br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
###################################################*/
}
?>