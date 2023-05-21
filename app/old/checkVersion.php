<?php

require('index.php');

$version = R::findOne('version');
echo $version->cur;