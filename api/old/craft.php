<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$tool = $_POST['tool'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    $tools = $user -> tools;
    $user -> tools = "{$tools} {$tool};";
    R::store($user);
    echo "1";
}