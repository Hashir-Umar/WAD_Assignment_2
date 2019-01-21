<?php
    include_once("../includes/session_start.php");  
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_account_type']))
    {
        session_destroy();
        header("Location: ../index.php");
    }
?>