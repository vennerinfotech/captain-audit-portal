<?php

function notify($to,$data){

    $api_key="AAAA2thubTE:APA91bHz1oyOuLpIvoA9soXqoAT7Dsy-3O9TtlR4FyZni7PFZrr3rfM7j4WlrMKUQRcl9-jmjWEkQudLTuQWc75MFsg-h6vrRMCZ4H6j_ds5p77nuFMJQDj1EuofT2KFXZjPrYSaldiw";
    $url="https://fcm.googleapis.com/fcm/send";
    $fields=json_encode(array('to'=>$to,'notification'=>$data));

    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));

    $headers = array();
    $headers[] = 'Authorization: key ='.$api_key;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

$to=$_GET['token'];
$data=array(
    'title'=>'Hello',
    'body'=>'Kartik'
);

notify($to,$data);
echo "Notification Sent";

?>