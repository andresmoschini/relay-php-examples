<?php

// SwiftMailer previously installed
// See https://github.com/DopplerRelay/docker-php/blob/master/Dockerfile
include_once "/usr/lib/vendor/swiftmailer/swiftmailer/lib/swift_required.php";

// Get username and password from environment variables
$username = getenv('DOPPLERRELAY_USERNAME');
$password = getenv('DOPPLERRELAY_PASSWORD');

// Relay SMTP service configuration
$host = 'smtp.dopplerrelay.com';
$port = 587;

// Custom data
$from = array('you@yourdomain.com' => 'Your Name');
$to = array(
    'recipient1@example.com'  => 'Recipient1 Name',
    'recipient2@example2.com' => 'Recipient2 Name'
);
$subject = 'Hello from Doppler Relay, PHP!';
$text = "Doppler Relay speaks plaintext";
$html = "Doppler Relay speaks <b>HTML</b>";

// Send message using SwiftMailer
$transport = Swift_SmtpTransport::newInstance($host, $port);
$transport->setUsername($username);
$transport->setPassword($password);
$swift = Swift_Mailer::newInstance($transport);
$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');
if ($recipients = $swift->send($message, $failures)) {
    echo 'Message successfully sent!';
} else {
    echo "There was an error:\n";
    print_r($failures);
}
