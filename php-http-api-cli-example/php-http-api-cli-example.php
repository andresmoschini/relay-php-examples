<?php
// CURL-less method with PHP5

$accountId = getenv('DOPPLERRELAY_ACCOUNT_ID');
$apikey = getenv('DOPPLERRELAY_APIKEY');

$url = "http://api.dopplerrelay.com/accounts/$accountId/messages";

$path = '2Libros.zip';
$data = file_get_contents($path);
$base64 = base64_encode($data);

$data = array(
    'from_name' => 'Your Name',
    'from_email' => 'amoschini@makingsense.com',
    'recipients' => array(
        array(
            'type' => 'to',
            'email' => 'andresmoschini@gmail.com',
            'name' => 'Test Recipient'
        )
    ),
    'attachments' => array(
        array(
            'filename' => $path,
            'base64_content' => $base64,
            'type' => 'application/x-zip-compressed'
        )
    ),
    'subject' => 'Testing Doppler Relay',
    'html' => '<strong>Doppler Relay</strong> is great!'
);

$body = json_encode($data);

$options = array(
    'http' => array(
        'header' => "Authorization: token $apikey\r\nContent-type: application/json\r\n",
        'method' => 'POST',
        'content' => $body
    )
);

$context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);

var_dump($result);
