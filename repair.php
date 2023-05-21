<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');

$article = R::dispense("repair");
$article->fio = $_POST['fio'];
$article->phone = $_POST['tel'];
$article->description = $_POST['description'];
$article->whats = $_POST['whats'];
$article->completed = false;
R::store($article);
?>