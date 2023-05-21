<?php

require('index.php');

$id = $_POST['id'];

$moves = R::findAll('moves');
foreach ($moves as $move)
{
    echo $move->username;
    echo ";";
    echo $move->end_pos;
    echo ";";
}
$user = R::findOne('users', 'id = ?', [$id]);
echo $user->username;