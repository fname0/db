<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');
$order = R::findOne("repair", "WHERE id = ?", [$_GET['id']]);
$order->completed = true;
R::store($order);
?>