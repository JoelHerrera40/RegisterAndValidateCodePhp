<?php

namespace BackendValidation\services;

require '../PHPMailer\PHPMailer.php';
require '../PHPMailer\SMTP.php';
require '../PHPMailer\Exception.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    public static function sendIn(string $email, string $subject, $message, $nombre)
    {
        $phpmailer = new PHPMailer();

        try {
            // Configuración de SMTP
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '18d345d72173a0';
            $phpmailer->Password = '87080da57fbe30';

            // Resto de la configuración de correo
            $phpmailer->setFrom('ElChallenge@Ready.com', 'Mailer');
            $phpmailer->addAddress($email, $nombre);
            $phpmailer->addReplyTo('info@example.com', 'Information');
            $phpmailer->addCC('cc@example.com');
            $phpmailer->addBCC('bcc@example.com');
            $phpmailer->isHTML(true);
            $phpmailer->Subject = $subject;
            $phpmailer->Body = $message;
            $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $phpmailer->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }
    }
}

// class SendMail
// {
//     public static function sendIn(string $email, string $subject, $message, $nombre)
//     {
//         $phpmailer = new PHPMailer();

//         try {
//             //Server settings
//             // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//             // $mail->isSMTP();                                            //Send using SMTP
//             // $mail->Host       = 'localhost';                     //Set the SMTP server to send through
//             // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//             // $mail->Username   = 'user@example.com';                     //SMTP username
//             // $mail->Password   = 'secret';                               //SMTP password

//             // $mail->isSMTP();
//             // $mail->Host = 'sandbox.smtp.mailtrap.io';
//             // $mail->SMTPAuth = true;
//             // $mail->Port = 2525;
//             // $mail->Username = '42b217dec883d5';
//             // $mail->Password = '89d26b64d7a585';

//             $phpmailer = new PHPMailer();
//             $phpmailer->isSMTP();
//             $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
//             $phpmailer->SMTPAuth = true;
//             $phpmailer->Port = 2525;
//             $phpmailer->Username = '18d345d72173a0';
//             $phpmailer->Password = '87080da57fbe30';

//             // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

//             //Recipients
//             $mail->setFrom('ElChallenge@Ready.com', 'Mailer');
//             $mail->addAddress($email, $nombre);     //Add a recipient
//             // $mail->addAddress('ellen@example.com');               //Name is optional
//             $mail->addReplyTo('info@example.com', 'Information');
//             $mail->addCC('cc@example.com');
//             $mail->addBCC('bcc@example.com');

//             //Attachments
//             $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//             $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//             //Content
//             $mail->isHTML(true);                                  //Set email format to HTML
//             $mail->Subject = $subject;
//             $mail->Body    = $message;
//             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//             $mail->send();
//             echo 'Message has been sent';
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
//     }
// }
