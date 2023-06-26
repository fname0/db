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
if (function_exists('curl_file_create')) {
    $cFile = curl_file_create($_FILES['file']['tmp_name']);
} else {
    $cFile = '@' . realpath($_FILES['file']['tmp_name']);
}
$post = array('id' => $article->id,'file'=> $cFile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://95.174.102.106:7474/api/loadfile.php');
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result=curl_exec ($ch);
curl_close ($ch);
?>