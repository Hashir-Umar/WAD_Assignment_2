<?php
    session_start();
    if(isset($_GET['email']) && isset($_GET['password']) && isset($_SESSION['user_email']) && $_SESSION['user_email'] == $_GET['email'])
    {
        setcookie('user_email', $_GET['email'], time() + (182 * 24 * 60 * 60), "/", NULL);
        setcookie('user_pass', $_GET['password'], time() + (182 * 24 * 60 * 60), "/", NULL);
    }

    $_SESSION['once_cookies'] = 'done once';
    header("Location: ../index.php");
?>