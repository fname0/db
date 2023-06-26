<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=95.174.102.106;dbname=kamaz', 'remote', 'yaDumalPass');

$data = json_decode($_POST['product']);
$product = R::findOne("products", 'WHERE id = ?', [$data->id]);
$product->out = $data->out;
$product->title = $data->title;
$product->price = $data->price;
$product->num = $data->num;
R::store($product);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://95.174.102.106/api/bridge.php");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'file' => 'p',
));
$result = curl_exec($ch);
curl_close($ch);
// $img_name = "productImg/".$data->id.".png";
// $tmp_img_name=$_FILES['file']['tmp_name'];
// move_uploaded_file($tmp_img_name,$img_name);
?>