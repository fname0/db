<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$pos = $_POST['pos'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    $user -> pos = $pos;
    R::store($user);
    echo '1';
}