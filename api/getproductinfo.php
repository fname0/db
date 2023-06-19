<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');
echo json_encode(R::findOne("products", "WHERE id = ?", [$_GET['id']]), JSON_UNESCAPED_UNICODE);
?>