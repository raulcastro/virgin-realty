<?php

$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-';
$data = array(
    'oid' => '00D41000001ND5a', 
    'first_name' => 'Jhon Do - Second Test',
    'email' => 'my@email.com',
    'phone' => '999 100 12 12',
    '00N4100000H02BG' => 'some notes, sample notes'
);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);