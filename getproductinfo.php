<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');
echo json_encode(R::findOne("products", "WHERE id = ?", [$_GET['id']]), JSON_UNESCAPED_UNICODE);
?>