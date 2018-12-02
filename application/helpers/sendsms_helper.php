<?php 
/*

Start sendsms_helper.php file
sendsms_helper.php
Save below code as sendsms_helper.php in /application/helpers/
Author: Spring Edge ( http://www.springedge.com ) */
function sendsms($number, $message_body, $return = '0') {

$sender = 'SEDEMO';  // Need to change

$smsGatewayUrl = 'http://springedge.com';

$apikey = '62q3z3hs4941mve32s9kf10fa5074n7';  // Need to change   

$textmessage = urlencode($message_body);

$api_element = '/api/web/send/';

$api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$number.'&message='.$textmessage;    
$smsgatewaydata = $smsGatewayUrl.$api_params;

$url = $smsgatewaydata;

$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, false);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);

curl_close($ch);

if(!$output){
   $output =  file_get_contents($smsgatewaydata);
}

if($return == '1'){

    return $output;        
    
}else{

    echo $output;
    
}
}

/* End sendsms_helper.php file */