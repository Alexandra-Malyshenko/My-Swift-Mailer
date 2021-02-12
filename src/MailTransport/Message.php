<?php

namespace App\MailTransport;

class Message
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $body;
    /**
     * @var string
     */
    private $email;

    public function __construct($title, $body, $email)
    {
        $this->title = $title;
        $this->body = $body;
        $this->email = $email;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getEmail()
    {
        return $this->email;
    }
}