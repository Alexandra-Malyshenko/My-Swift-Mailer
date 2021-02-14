<?php

namespace App\MailTransport;
use App\MailTransport\TransportInterface;
use App\MailTransport\Message;

class MailTransport implements TransportInterface
{
    /**
     * @var \Swift_SmtpTransport
     */
    private $transport;
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(string $host, string $port, string $username, string $password)
    {
        $this->transport = (new \Swift_SmtpTransport($host, $port, 'ssl'))
            ->setUsername($username)
            ->setPassword($password);
        $this->mailer = (new \Swift_Mailer($this->transport));
    }

    public function send(Message $message): bool
    {
        return $this->mailer->send(

                (new \Swift_Message($message->getTitle()))
                ->setFrom(['MOPOP@doe.com' => 'Mopop Administration'])
                ->setTo($message->getEmail())
                ->setBody($message->getBody(), 'text/html')
        ) !== 0 ;
    }
}