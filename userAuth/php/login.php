<?php
if (isset($_POST['submit'])) {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    loginUser($username, $password);
}

function loginUser($username, $password)
{
    $dir = "..\storage\users.csv";
    $fopn = fopen($dir, 'r');
    $fget = fgets($fopn);

    $usercontent = file($fget);

    foreach ($usercontent as $index => $value) {
        do {
            if ($username === $value) {
                if (!$password  === $value) {
                    header('Location: ..\forms\login.html?error');
                    exit();
                } else {
                    session_start();
                    $_SESSION['username'] = $_POST['email'];
                    header('Location: ..\dashboard.php?success');
                    exit();
                }
            } else {
                header('Location: ..\forms\login.html?error');
                exit();
            }
        } while ($index > 0);
    }
    fclose($fopn);
}
