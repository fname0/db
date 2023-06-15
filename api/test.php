<?php
header('Access-Control-Allow-Origin: *');
file_put_contents("post.log", print_r($_POST, true));
?>