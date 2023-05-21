<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    echo $user -> wood ;
    echo ";";
    echo $user -> stone ;
    echo ";";
    echo $user -> thLvl ;
    echo ";";
}