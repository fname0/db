<?php

require('index.php');

$objs = R::findAll('global');
foreach ($objs as $obj)
{
    echo $obj->trueid;
    echo ";";
    echo $obj->type;
    echo ";";
    echo $obj->pos;
    echo ";";
}