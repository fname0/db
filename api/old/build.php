<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$building = $_POST['building'];
$pos = $_POST['pos'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    $buildings = $user -> buildings;
    $user -> buildings = "{$buildings} {$building} {$pos};";
    R::store($user);
    echo "1";
}