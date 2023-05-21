<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=sql7.freemysqlhosting.net;dbname=sql7618477", 'sql7618477', 'd1VghpTHzr');

$data = json_decode($_POST['product']);
$product = R::findOne("products", 'WHERE id = ?', [$data->id]);
$product->out = $data->out;
$product->title = $data->title;
$product->price = $data->price;
$product->num = $data->num;
R::store($product);
error_log($_FILES['file']['name']);
$img_name = "productImg/".$data->id.".png";
$tmp_img_name=$_FILES['file']['tmp_name'];
move_uploaded_file($tmp_img_name,$img_name);
?>