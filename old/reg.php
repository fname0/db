<?php

require('index.php');

$username = $_POST['name'];
$pwd = $_POST['pwd'];
$mail = $_POST['mail'];

if ($username != NULL && $pwd != NULL && $mail != NULL)
{
    $error = "|1";
    if (strlen(trim($username)) <= 3 ||  strlen(trim($username)) > 15) $error = "Username must be between 4 and 15 characters long";
    else if (strlen(trim($pwd)) < 5 || strlen(trim($pwd)) > 20) $error = "Password must be between 5 and 20 characters long";
    else if (strpos($mail, '@') == false || strpos($mail, '.') == false) $error = "Non-existent mail";
    else if (R::count('users', 'mail = ?', [trim($mail)]) > 0)
    {
        $error = "User with this email already exists";
    }
    else if (R::count('users', 'username = ?', [trim($username)]) > 0)
    {
        $error = "User with this username already exists";
    }
    else if (strpos($mail, ';') == true || strpos($username, ';') == true || strpos($pwd, ';') == true)
    {
        $error = "You used a forbidden character";
    }
    else
    {
        $user = R::dispense('users');
        $user->username = trim($username);
        $user->password = password_hash(trim($pwd), PASSWORD_DEFAULT);
        $user->mail = trim($mail);
        $user->wood = 0;
        $user->thLvl = 0;
        $user->stone = 0;
        R::store($user);
        $user = R::findOne('users', 'username = ?', [trim($username)]);
        echo $user->id;
    }
    echo $error;
}
else
{
    echo 'Where is my data?';
}