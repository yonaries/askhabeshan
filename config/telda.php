<?php
session_start();
?>

<?php

$otpcode=rand(1000,9999);// generating otp code random
$date=date("Y-m-d-H:i:s");//assigning now date

$data_array =array("phone"=> $_SESSION['phonenumber'],
"message"=>"Your Verification code to Ask Habeshan is ".$otpcode,
"sendDate"=> "2021-12-07T21:48:45.901Z");//sms data array

$smsdata=json_encode($data_array);//array to json
echo $smsdata;
echo "<br>";
echo "<br>";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.telda.com.et/api/write/SendMessage',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$smsdata,
  CURLOPT_HTTPHEADER => array(
    'accept: text/plain',
    'Content-Type: application/json',
    'Authorization: Basic KZoHgAHu2UhQ3gNtbsfuQI38YsC9shRTNTAwKzI1MTk2MjIxMDIwNQ=='
  ),
));

$response = curl_exec($curl);
echo $response;
if($e = curl_error($curl)){
    echo $e;
    echo "Faild";
}
else{
    echo "Congrats, It Worked!";
    echo "<br>";
    if($response){ 
        $decoded=json_decode($response);
        foreach($decoded as $key => $val){
            echo $key.': '.$val.'<br>';
        }
    }
    $_SESSION['otpcode']=$otpcode;
    $_SESSION['phonenumber']=$_SESSION['phonenumber'];
    header('location:../pages/verify.php');
}
curl_close($curl);?>
