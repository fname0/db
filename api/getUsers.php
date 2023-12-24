<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=db4free.net;dbname=evraz613', 'evrazuser', 'ev_613raz');
echo json_encode(R::findAll("users"));
?>