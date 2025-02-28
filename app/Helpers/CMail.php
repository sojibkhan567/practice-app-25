<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CMail
{
    public static function send($config, $attachments = [])
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = config('services.mail.host');                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = config('services.mail.username');                     //SMTP username
            $mail->Password   = config('services.mail.password');                               //SMTP password
            $mail->SMTPSecure = config('services.mail.encryption');            //Enable implicit TLS encryption
            $mail->Port       = config('services.mail.port');                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //dd(config('services.mail.from_address'));
            //Recipients
            $mail->setFrom(
                isset($config['from_address']) ? $config['from_address'] : config('services.mail.from_address'),
                isset($config['from_name']) ? $config['from_name'] : config('services.mail.from_name')
            );
            $mail->addAddress($config['recipient_address'], isset($config['recipient_name']) ? $config['recipient_name'] : null);     //Add a recipient

            // Attachments
            if (!empty($attachments)) {
                foreach ($attachments as $attachment) {
                    //dd($attachment);
                    $mail->addAttachment($attachment);
                }
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $config['subject'];
            $mail->Body    = $config['body'];

            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
