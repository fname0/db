<?php

require('index.php');

$id = $_POST['id'];

$user = R::findOne('users', 'id = ?', [$id]);
$user->ip = $_SERVER['REMOTE_ADDR'];
R::store($user);
echo $user->username;