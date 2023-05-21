<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$wood = $_POST['wood'];
$stone = $_POST['stone'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    $user -> wood = $wood;
    $user -> stone = $stone;
    R::store($user);
}