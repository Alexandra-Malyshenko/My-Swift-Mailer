<?php

namespace App\MailTransport;

interface TransportInterface
{
    public function send(Message $message): bool;
}