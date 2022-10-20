<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    $savedata = fopen("..\storage\users.csv", "w+");
    $inputtofile = $password . "\r\n" . $email . "\r\n" . $username;
    fwrite($savedata, $inputtofile);
    fclose($savedata);
    echo "User Successfully registered " . ('<a href="..\forms\login.html">Login</a>');
}
