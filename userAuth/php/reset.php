<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword)
{
    $dir = "..\storage\users.csv";
    $usercontent = file_get_contents($dir);
    if (!stristr($usercontent, $email)) {
        echo "User does not exist";
    } else {
        $input =  $newpassword . "\r\n"; //
        $yy = fopen($dir, 'r+');
        fwrite($yy, $input);
        fclose($yy);
        header('Location: ..\forms\login.html?resetsucc');
    }
}
