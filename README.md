# My Swift Mailer

Send emails from your site. Based on swiftmailer/swiftmailer.

##Install with Composer
`composer require swarletta/swiftmailer`

##Initialization
First, you need to require a library that helps you work with .env files

Then create an instance of MailTransport. You will need that params:

For SMTP Server: smtp.gmail.com

– _SMTP user: vashemail@gmail.com_

– _SMTP password: password from your Gmail account_

– _SMTP port: 465_

– _TLS/SSL: needed._

### Here is an example of Swiftmailer call

``` php
<?php

require 'vendor/autoload.php';
use App\MailTransport\MailTransport;
use App\MailTransport\Message;
use App\Render\Render;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$mailTransport = new MailTransport(
    getenv('HOST'),
    (int) getenv('PORT'),
    getenv('USER_EMAIL'),
    getenv('USER_PASSWORD'),
    'ssl'
);
$templateName = 'auth';
$message = 'You have been successufuly authorization';
$templateMessage = (new Render())->build_email_template($templateName, $message);

$mailTransport->send( new Message('Welcome', $templateMessage, getenv('EMAIL_TO')));

```

