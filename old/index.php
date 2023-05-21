<?php

require_once __DIR__ . "/vendor/autoload.php";
class_alias("\RedBeanPHP\R", "\R");
R::setup("mysql:host=localhost;dbname=test", 'root', '');

if (!R::testConnection())
{
	die("n");
}