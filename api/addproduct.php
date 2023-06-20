<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');

$article = R::dispense("products");
$article->title = $_POST['title'];
$article->num = $_POST['num'];
$article->price = $_POST['price'];
$article->cat = $_POST['cat'];
$article->out = ucfirst($_POST['out']);
R::store($article);
?>