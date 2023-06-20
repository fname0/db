<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=kamazdb', 'remoteconn', 'yaDumalPass');
R::trash(R::findOne('products', "WHERE id = ?", [$_GET['id']]));
?>