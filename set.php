<?php
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');

$product = R::dispense("products");
$product->title = $_GET['title'];
$product->num = $_GET['num'] != '' ? $_GET['num'] : "-";
$product->price = $_GET['price'];
$product->cat = 'metiz';
$product->out = $_GET['out'];
R::store($product);
?>