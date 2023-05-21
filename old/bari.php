<?php

//die(0);

/*require('index.php');

for ($i = 0; $i < 100; $i++) {
    $obj = R::dispense('global');
    $obj->type = 0;
    $x = random_int(-110, 110);
    $y = random_int(-110, 110);
    $obj->pos = "$x $y";
    if (R::findOne('users', 'pos = ?', ["$x $y"]) == null and R::findOne('global', 'pos = ?', ["$x $y"]) == null) {
        R::store($obj);
    }
}

require('index.php');

$objs = R::findAll('global');
$i = 0;
foreach ($objs as $obj)
{
    $obj->trueid = $i;
    $i++;
    R::store($obj);
}*/

$users = R::findAll('users');
foreach ($users as $user) {
    $user->wood = $user->wood + 100;
    R::store($user);
}