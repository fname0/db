<?php
header('Access-Control-Allow-Origin: *');
$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'http://95.174.102.106:7474/api/test.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($_POST)
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: ".$response;
?>