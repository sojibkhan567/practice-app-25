<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('sendMail')) {
    /**
     * Send an email using PHPMailer.
     *
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body Email body (HTML supported)
     * @param array $attachments Optional array of file paths to attach
     * @return bool|string Returns true on success, or an error message on failure
     */
    function sendMail($to, $subject, $body, $attachments = [])
    {
        //dd(config('services.mail.host'));
        $mail = new PHPMailer(true); // Enable exceptions

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = config('services.mail.host');
            $mail->Password = config('services.mail.password');
            $mail->SMTPSecure = config('services.mail.encryption');
            $mail->Port = config('services.mail.port');

            // Sender and reply-to
            $mail->setFrom(config('services.mail.from_address'), config('services.mail.from_name'));
            //$mail->addReplyTo(env('CMAIL_REPLY_TO', 'reply@example.com'), env('CMAIL_FROM_NAME', 'Example'));

            // Recipient
            $mail->addAddress($to);

            // Attachments
            if (!empty($attachments)) {
                foreach ($attachments as $attachment) {
                    $mail->addAttachment($attachment);
                }
            }

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send email
            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
