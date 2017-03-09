<?php
// CURL-less method with PHP5

$accountId = getenv('DOPPLERRELAY_ACCOUNT_ID');
$apikey = getenv('DOPPLERRELAY_APIKEY');

$url = "http://api.dopplerrelay.com/accounts/$accountId/messages";

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