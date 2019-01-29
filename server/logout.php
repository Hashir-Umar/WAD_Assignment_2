<?php
    session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_account_type']))
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '',time() + (182 * 24 * 60 * 60), "/", NULL);
            }
        }

        session_destroy();
        header("Location: ../pages/login.php");
    }
    else
        header("Location: ../index.php");
?>