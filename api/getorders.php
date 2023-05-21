<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');
$orders = R::findAll("orders", "WHERE completed = ?", [0]);
$lastId = 0;
foreach ($orders as $order) {
    $products = [];
    foreach (explode(",", $order->products) as $id) {
    array_push($products, R::findOne("products", "WHERE id = ?", [$id]));
    }
    $order->products=$products;
    $order->type="product";
    $order->rawId=strval($order->id);
    $lastId=$order->id;
}

$repairorders = R::findAll("repair", "WHERE completed = ?", [0]);
foreach ($repairorders as $order) {
    $order->rawId=strval($order->id+$lastId);
    $order->type="repair";
    array_push($orders, $order);
}


echo json_encode($orders, JSON_UNESCAPED_UNICODE);
?>