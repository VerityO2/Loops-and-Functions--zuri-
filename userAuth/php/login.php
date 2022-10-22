<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    loginUser($username, $password);
}

function loginUser($username, $password)
{
    $dir = "..\storage\users.csv";
    $usercontent = file($dir);


    foreach ($usercontent as $index => $value) {

        if ($password == $value) {
            if (!$username  == $value) {
                header('Location: ..\forms\login.html?error');
            } else {
                session_start();
                $_SESSION['Username'] = $_POST['email'];
                header('Location: ..\dashboard.php?success');
                exit();
            }
        } else {
            header('Location: ..\forms\login.html?error');
            exit();
        }
    }
}
