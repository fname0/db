<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');

$article = R::dispense("repair");
$article->fio = $_POST['fio'];
$article->phone = $_POST['tel'];
$article->description = $_POST['description'];
$article->whats = $_POST['whats'];
$article->completed = false;
R::store($article);
?>