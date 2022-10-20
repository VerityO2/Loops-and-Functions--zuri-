<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    loginUser($username, $password);
}

function loginUser($username, $password)
{
    $dir = "..\storage\users.csv";
    $usercontent = file_get_contents($dir);
    if (stristr($usercontent, $username)) {
        if (!stristr($usercontent, $_POST['password'])) {
            header('Location: ..\forms\login.html?error');
        } else {
            session_start();
            $_SESSION['Username'] = $_POST['email'];
            header('Location: ..\dashboard.php?success');
        }
    } else {
        header('Location: ..\forms\login.html?error');
    }
}
