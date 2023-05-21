<?php

require('index.php');

$accessKey = $_POST['accessKey'];

if ($accessKey != "O];@Ospi8Cw]w0>SSkBzz?r0eB^;0S|o)") echo 'unCorrect';
else 
{
    $moves = R::findAll("moves");
    foreach ($moves as $move)
    {
        if ($move->end <= date("Y-m-d H:i:s"))
        {
            $user = R::findOne('users', 'id = ?', [$move->user_id]);
            $user->pos = $move->end_pos;
            R::store($user);
            R::trash($move);
        }
    }
}