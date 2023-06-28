<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=95.174.102.106;dbname=kamaz', 'remote', 'yaDumalPass');
$product = R::findOne('products', "WHERE id = ?", [$_GET['id']]);
$product->deleted=1;
R::store($product);
?>