<?php

const API_KEY = 'JruYd0XUwK3ABPpti3XZy17Lq9l6FPRf4SQ1Hhyk';
const API_URL = 'https://api.postcodeapi.nu/v3/lookup/'; 

$headers = [];
$headers[] = 'X-Api-Key: '. API_KEY;

if (isset($_GET['zip']) && $_GET['zip'] && isset($_GET['number']) && $_GET['number']) { 

   $url = API_URL . $_GET['zip'] . '/' . $_GET['number'];  

   $curl = curl_init($url);

   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

   $response = [];
   $result = curl_exec($curl); 

   if ($result) {
      echo $result;
      curl_close($curl);
      exit; 
   }

}

http_response_code(400); // Bad request
