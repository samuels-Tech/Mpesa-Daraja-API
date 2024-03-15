<?php
//include access token  file
// include 'accessToken.php';
// date_default_timezone_set('Africa/Nairobi');
// $processrequestUrl ='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
// $callbackurl='';
// $passkey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
// $BusinessShortCode='174379';
// $Timestamp=date('YmdHls');
// //encpytion of data to get pasword
// $Password=base64_encode($BusinessShortCode. $passkey.$Timestamp);
// $phone='254727045660';
// $money='1';
// $partA=$phone;
// $partB="254727045660";
// $AccountReference='Pay my debt';
// $TransactionDesc='stkpush test';
// $Amount=$money;
// $stkpushheader=['content-Type:application/json','Authorization:Bearer'.$access_token];
// //initiate curl
// $curl =curl_init();
// curl_setopt($curl,CURLOPT_URL,$processrequestUrl);
// curl_setopt($curl,CURLOPT_HTTPHEADER,$stkpushheader);
// $curl_post_data=array(
//         "BusinessShortCode"=>$BusinessShortCode,    
//         "Password"=>$Password,    
//         "Timestamp"=>$Timestamp,    
//         "TransactionType"=> "CustomerPayBillOnline",    
//         "Amount"=> "$Amount",    
//         "PartyA"=>$partA,    
//         "PartyB"=>$BusinessShortCode,  
//         "PhoneNumber"=>$partA,  
//         "CallBackURL"=>$callbackurl,  
//         "AccountReference"=>$AccountReference,  
//         "TransactionDesc"=>$TransactionDesc
     
// );
// $data_string=json_encode($curl_post_data);
// curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl,CURLOPT_POST,true);
// curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);
// $curl_reponse=curl_exec($curl);
// echo $curl_reponse;


include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://example.com/callback'; // Replace with your callback URL
$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
// Encryption of data to get password
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = '254727045660';
$money = '1';
$partA = $phone;
$Amount = $money;
$AccountReference = 'Pay my debt';
$TransactionDesc = 'STK Push Test';
$stkpushheader = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token]; // Add space after Bearer

// Initiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
$curl_post_data = array(
    "BusinessShortCode" => $BusinessShortCode,
    "Password" => $Password,
    "Timestamp" => $Timestamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => $Amount,
    "PartyA" => $partA,
    "PartyB" => $BusinessShortCode, // Change if necessary
    "PhoneNumber" => $partA,
    "CallBackURL" => $callbackurl,
    "AccountReference" => $AccountReference,
    "TransactionDesc" => $TransactionDesc
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);

// Handle errors
if ($curl_response === false) {
    $error_message = curl_error($curl);
    // Handle error appropriately, e.g., log or display to the user
    echo "cURL Error: " . $error_message;
} else {
    echo $curl_response;
}

// Close curl resource
curl_close($curl);
?>


?>