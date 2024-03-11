<?php
//mpesa aip key
$consumerKey="y1NFUJXWGZXn5mHk26p2V3dNgwEyYTbU7fumImftXxYohbi5";

$consumerSecret="NXUvnjtqMjz2XPWaQ2L6Q6vA591KmHLA1hEwbMYGaJW6JRTWNlAMRkPagYVOeAst";
$access_token_url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$headers= ['Content-Type:application/json;charaset=utf8'];
$curl=curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($curl,CURLOPT_HEADER,FALSE);
curl_setopt($curl,CURLOPT_USERPWD,$consumerKey . ':' .$consumerSecret );
$result = curl_exec($curl);
$status =curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result=json_decode($result);
echo $access_token = $result->access_token;
curl_close($curl);

?>