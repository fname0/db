<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=95.174.102.106;dbname=kamaz', 'remote', 'yaDumalPass');

$article = R::dispense("products");
$article->title = $_POST['title'];
$article->num = $_POST['num'];
$article->price = $_POST['price'];
$article->cat = $_POST['cat'];
$article->out = ucfirst($_POST['out']);
R::store($article);
?>