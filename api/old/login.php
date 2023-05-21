<?php

require('index.php');

$mail = $_POST['mail'];
$pwd = $_POST['pwd'];

if ($pwd != NULL && $mail != NULL)
{
    $error = "|1";
    if (trim($mail) == '') $error = "Enter a email";
    else if (trim($pwd) == '') $error = "Enter a password";
    else
    {
        $user = R::findOne('users', 'mail = ?', [trim($mail)]);
        if ($user)
        {
            if (password_verify(trim($pwd), $user->password))
            {
                echo $user->id;
            }
            else
            {
                $error = 'Incorrect password';
            }
        }
        else
        {
            $error = 'Invalid email';
        }
    }
    echo $error;
}
else
{
    echo 'Where is my data?';
}