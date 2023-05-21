<?php

require('index.php');

$id = $_POST['id'];
$accessKey = $_POST['accessKey'];
$endPos = $_POST['endPos'];

if ($accessKey != "3,812312E+18" and $accessKey != "3.812312E+18") echo 'unCorrect';
else 
{
    $user = R::findOne('users',  'id = ?', [$id]);

    if (R::findOne('moves', 'user_id = ?', [$id]) != null)
        echo 0;
    else
    {
        $action = R::dispense('moves');
        $action->username = $user->username;
        $action->userId = $id;
        $action->start = date("Y-m-d H:i:s");
        $time = strval((abs(intval(explode(' ', $user->pos)[0]) - intval(explode(' ', $endPos)[0])) + abs(intval(explode(' ', $user->pos)[1]) - intval(explode(' ', $endPos)[1]))) * 30);
        $action->end = date("Y-m-d H:i:s", strtotime("+$time seconds"));
        $action->endPos = $endPos;
        R::store($action);

        echo 1;
    }
}