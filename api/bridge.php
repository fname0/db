<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=95.174.102.106;dbname=kamaz', 'remote', 'yaDumalPass');
$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'http://95.174.102.106/test.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($_POST)
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: ".$response;
?>