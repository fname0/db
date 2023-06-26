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
if (function_exists('curl_file_create')) {
    $cFile = curl_file_create($_FILES['file']['tmp_name']);
} else {
    $cFile = '@' . realpath($_FILES['file']['tmp_name']);
}
$post = array('id' => $data->id,'file'=> $cFile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://95.174.102.106:7474/api/bridge.php');
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result=curl_exec ($ch);
curl_close ($ch);
?>