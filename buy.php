<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');
$order = R::dispense('orders');
$order->products=$_GET['products'];
$order->productscount=$_GET['count'];
$order->productspricesum=$_GET['sum'];
$order->fio=$_GET['fio'];
$order->phone=$_GET['phone'];
$order->whats=$_GET['whats'];
$order->completed=false;
R::store($order);
?>