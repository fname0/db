<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup( 'mysql:host=95.174.102.106;dbname=kamaz', 'remote', 'yaDumalPass');
$prods = R::findAll('products');
echo "[";
foreach ($prods as $prod) {
    echo $prod->id;
    if ($prod->id != 1436) echo ",";
}
echo ']';
echo "\n[";
foreach ($prods as $prod) {
    echo "$prod->title";
    if ($prod->id != 1436) echo ",";
}
echo ']';
echo "\n[";
foreach ($prods as $prod) {
    echo "$prod->num";
    if ($prod->id != 1436) echo ",";
}
echo ']';
echo "\n[";
foreach ($prods as $prod) {
    echo $prod->price;
    if ($prod->id != 1436) echo ",";
}
echo ']';
echo "\n[";
foreach ($prods as $prod) {
    echo $prod->cat;
    if ($prod->id != 1436) echo ",";
}
echo ']';
?>