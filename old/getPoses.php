<?php

require('index.php');

$id = $_POST['id'];

$users = R::findAll('users');
foreach ($users as $user)
{
    if ($user->pos != null) 
    {
        echo $user->username;
        echo ";";
        echo $user->pos;
        echo ";";
        echo $user->thLvl;
        echo ";";
    }
}
$user = R::findOne('users', 'id = ?', [$id]);
echo $user->username;