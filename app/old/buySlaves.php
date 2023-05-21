<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$count = $_POST['count'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);
    if ($user->slaves == null)
        $oldCount = 0;
    else
        $oldCount = intval(explode(" ", explode(";", $user->slaves)[0])[1]);
    $newCount = $oldCount + $count;
    $user->slaves = "0 $newCount;";
    R::store($user);
    echo "1";
}