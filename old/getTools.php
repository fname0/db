<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    if ($user -> tools != null)
    {
        echo $user -> tools;
    }
    else
    {
        echo "none";
    }
}