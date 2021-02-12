<?php

require 'vendor/autoload.php';
use App\MailTransport\MailTransport;
use \App\MailTransport\Message;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$mailTransport = new MailTransport(
    getenv('HOST'),
    (int) getenv('PORT'),
    getenv('USER_EMAIL'),
    getenv('USER_PASSWORD'),
    'ssl'
);
var_dump(getenv('USER_EMAIL'));

$mailTransport->send( new Message('Welcome', 'Hello world!', getenv('WONDER_TO_EMAIL')));

