<?php
    session_start();
    $_SESSION['user_id'] = 1;
    include_once("functions.php");
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
    else if(isset($_POST["uploadHostel"]))
    {  
        $hostel_name = $_POST["hostel_name"];
        $hostel_city = $_POST["hostel_city"];
        $hostel_address = $_POST["hostel_address"];
        $hostel_rooms = $_POST["hostel_rooms"];
        $hostel_extras = $_POST["hostel_extras"];
        $hostel_image_name = basename($_FILES['user_file']['name']);
        $hostel_image_temp_name = $_FILES['user_file']['tmp_name'];
        
        validateAndUpldoad($hostel_name, $hostel_city, $hostel_address, $hostel_rooms, $hostel_extras, $hostel_image_name, $hostel_image_temp_name);
    }

?>