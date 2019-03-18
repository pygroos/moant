<?php

namespace App\Services;

use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class Mail
{
    public static function send($address, $subject, $content)
    {
        $setForm = env('MAIL_FROM_NAME').' '.'<'.env('MAIL_FROM_ADDRESS').'>';
        $mail = new Message;
        $mail->setFrom($setForm);
            $mail->addTo($address);
            $mail->setSubject($subject);
            $mail->setBody($content);

        $mailer = new SmtpMailer([
            'host' => env('MAIL_HOST'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD')
        ]);
        $mailer->send($mail);
    }
}