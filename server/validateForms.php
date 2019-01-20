<?php
    require_once "database_connection.php";
    
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT  * FROM `users` WHERE user_email = '$email' AND  user_password = '$pass'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            header('Location: ../index.php'); 
        }
        else
        {
            // echo '<script> document.getElementById("email_error").innerHTML = "*Email and Password does not match";</script>';
            header('Location: ../pages/login.php');
        }
    }
?>