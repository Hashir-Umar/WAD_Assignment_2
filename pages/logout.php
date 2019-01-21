<?php
    session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_account_type']))
    {
        session_destroy();
        header("Location: ../index.php");
    }
?>