<?php
session_start();
$mob_num=$_POST['mob_no'];
$generated_otp= rand(100000,999999);
$_SESSION["mob_otp"] = $generated_otp;
// echo $_SESSION["mob_otp"];
// ...................my current code
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "YOUR OTP IS: $generated_otp",
    "language" => "english",
    "route" => "p",
    "numbers" => "$mob_num",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),

      CURLOPT_HTTPHEADER => array(
    "authorization: tBXaIAydihqC7KO9kgoeGTVUSm1zLn6RcMPWxjs0fw458H3pFEfZoOrWkM7hXV9IjltNb3cKeDYyUa4z",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}



// <?php
// $fields = array(
//     "sender_id" => "FSTSMS",
//     "message" => "YOUR OTP IS: 456723",
//     "language" => "english",
//     "route" => "p",
//     "numbers" => "7275391080,8888888888,7777777777",
// );

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_SSL_VERIFYHOST => 0,
//   CURLOPT_SSL_VERIFYPEER => 0,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => json_encode($fields),
//   CURLOPT_HTTPHEADER => array(
//     "authorization: tBXaIAydihqC7KO9kgoeGTVUSm1zLn6RcMPWxjs0fw458H3pFEfZoOrWkM7hXV9IjltNb3cKeDYyUa4z",
//     "accept: */*",
//     "cache-control: no-cache",
//     "content-type: application/json"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }