<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$thlvl = $_POST['thLvl'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    $user -> th_lvl = $thlvl;
    R::store($user);
}