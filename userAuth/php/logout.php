<?php

function logout()
{
    if (!isset($_SESSION['username']['email'])) {
        header('Location: ..\dashboard.php?still?loggedin');
        exit();
    } else {
        session_destroy();
        header('Location: ..\forms\login.html?loggedout');
    }
}

logout();
?>