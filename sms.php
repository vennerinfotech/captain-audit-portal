<?php
//Your authentication key
$authKey = "60503d9e86755";

//Multiple mobiles numbers separated by comma
$mobileNumber = "8980317457";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "FDMOHL";

//Your message to send, Add URL encoding here.
$message = urlencode("FOOD MOHALLA\n\nBE INDEPENDENT WITH YOUR CHOICE.\nGET 40% OFF ON EVERY 2ND PIZZA*\n\nValid Till 22nd Aug,21\n\nContact your Nearest FooD Mohalla Outlet");

//Define route 
$route = "trans_dnd";
//Prepare you post parameters
$postData = array(
    'apikey' => $authKey,
    'route' => $route,
    'sender' => $senderId,
    'mobileno' => $mobileNumber,
    'text' => $message
);

//API URL
$url="https://sms.mobileadz.in/api/push?";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
?>

