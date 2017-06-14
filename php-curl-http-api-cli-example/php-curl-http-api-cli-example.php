<?php

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

$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Authorization: token '.$apikey,
	'Content: ' . strlen($data_string))
);                                                                                                                   
                                                                                                                    
$result = curl_exec($ch);

print_r($result);