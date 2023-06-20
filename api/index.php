<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');
echo json_encode(R::findAll("products", "WHERE cat = ? LIMIT 10", [$_GET['cat']]), JSON_UNESCAPED_UNICODE);
?>