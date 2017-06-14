<?php
// CURL-less method with PHP5

$accountId = getenv('DOPPLERRELAY_ACCOUNT_ID');
$apikey = getenv('DOPPLERRELAY_APIKEY');

$url = "http://api.dopplerrelay.com/accounts/$accountId/messages";

$file1 = file_get_contents('El ingenioso hidalgo don Quijote de la Mancha.zip');
$file2 = file_get_contents('El ingenioso hidalgo don Quijote de la Mancha.pdf');

$data = array(
    'from_name' => 'Your Name',
    'from_email' => 'test@example.com',
    'recipients' => array(
        array(
            'type' => 'to',
            'email' => 'test@example.com',
            'name' => 'Test Recipient'
        )
    ),
    'attachments' => array(
        array(
            'filename' => 'El ingenioso hidalgo don Quijote de la Mancha.zip',
            'base64_content' => base64_encode($file1),
            'type' => 'application/x-zip-compressed'
        ),
        array(
            'filename' => 'El ingenioso hidalgo don Quijote de la Mancha.pdf',
            'base64_content' => base64_encode($file2),
            'type' => 'application/pdf'
        )
    ),
    'subject' => 'Testing Doppler Relay',
    'html' => '<a href="https://www.dopplerrelay.com/">Doppler Relay</a> is great!'
);

$options = array(
    'http' => array(
        'header' => "Authorization: token $apikey\r\nContent-type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data),
        'ignore_errors' => true
    )
);

$context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);

var_dump($result);
