<?php
namespace App\Core;

use Config;
use Illuminate\Contracts\Mail\Mailer;

class BaseMailer
{
    public $toEmail;
    public $toName;
    public $fromEmail;
    public $fromName;
    public $subject;
    public $view;
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->toEmail = env('MAIL_CONTACT', 'info@no-problem-learning.com');
        $this->toName = env('MAIL_CONTACT_NAME', 'NPL Contact Mail');
        $this->fromEmail = env('MAIL_FROM', 'info@no-problem-learning.com');
        $this->fromName = env('MAIL_FROM_NAME', 'No Problem Learning');
        $this->view = 'emails.welcome';
    }

    public function fire($data)
    {
        // type cast to array if the params is an object
        is_object($data) ? (array)$data : $data;

        $this->mailer->send($this->view, $data, function ($message) {
            $message
                ->from($this->fromEmail, $this->fromName)
                ->sender($this->fromEmail, $this->fromName)
                ->to($this->toEmail, $this->toName)
                ->subject($this->subject);
        });

    }
}