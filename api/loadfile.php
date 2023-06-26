<?php
header('Access-Control-Allow-Origin: *');
$img_name = "productImg/".$_POST['id'].".png";
$tmp_img_name=$_FILES['file']['tmp_name'];
move_uploaded_file($tmp_img_name,$img_name);