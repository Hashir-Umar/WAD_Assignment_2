<?php session_start(); ?>

<!-- dummy id -->
<?php $_SESSION['user_id'] = 1; ?>
<?php
    include_once("functions.php");
    require_once "database_connection.php";
    
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $regex_email = '/^[A-Za-z0-9]+\.?[A-Za-z0-9]+\@[a-z0-9]+\.[a-z]{2,4}(\.[a-z]{2,4})?$/';
        
        $regex_pass = "/^.*(?=.{6,})(?=.*[a-zA-Z])[a-zA-Z0-9]+$/";

        if(!preg_match($regex_email, $email))
        {
            $_SESSION['error_msg'] = "*Invalid Email";
            header('Location: ../pages/login.php');
            die();
        }

        if(!preg_match($regex_pass, $pass))
        {
            $_SESSION['error_msg'] = "*Invalid password";
            header('Location: ../pages/login.php');
            die();
        }


        $sql = "SELECT  * FROM `users` WHERE user_email = '$email' AND  user_password = '$pass'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            header('Location: ../index.php'); 
        }
        else
        {
            $_SESSION['error_msg'] = "*Email and Password does not match";
            header('Location: ../pages/login.php');
            die();
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

        if (!preg_match('/image/', $_FILES['user_file']['type']))
        {
            $_SESSION['error_msg'] = "Non-image files are not allowed!";
            header("Location: ../pages/add-hostel.php");
            die();
        }
        
        $hostel_name_regex = '/^(?=[a-z]{2})(?=.{4,26})(?=[^.]*\.?[^.]*$)(?=[^_]*_?[^_]*$)[\w.]+$/iD';
        $hostel_city_regex = '/Lahore|Islamabad|Karachi|Faisalabad|Peshawar|Quetta/';
        $hostel_address_regex = '/^[a-zA-Z]([a-zA-Z-]+\s)+\d{1,4}$/';
        
        if($hostel_name == ""
        || $hostel_city == ""
        || $hostel_address == ""
        || $hostel_rooms == ""
        || $hostel_image_name == "") {
            $_SESSION['error_msg'] = "You can not leave any feild empty";
            header("Location: ../pages/add-hostel.php");
            die();
        }

        if (!preg_match($hostel_name_regex,  $hostel_name))  {
            $_SESSION['error_msg'] = "Hostel name not valid";
            header("Location: ../pages/add-hostel.php");
        }
        else if (!preg_match($hostel_city_regex,  $hostel_city))  {
            $_SESSION['error_msg'] = "City name not valid";
            header("Location: ../pages/add-hostel.php");
        }
        else if (!preg_match($hostel_address_regex,  $hostel_address))  {
            $_SESSION['error_msg'] = "Address not valid";
            header("Location: ../pages/add-hostel.php");
        }
        else {
            $hostel_owner = $_SESSION['user_id'];
            $hostel_id = getNewHostelID($conn);
            $uploaddir = 'src/hostel_images/'.$hostel_id.'_'.$hostel_image_name;

            global $conn;
            $sql = "INSERT INTO `pending_hostels`(`hostel_name`, `hostel_city`, `hostel_address`, `hostel_rooms`, `hostel_extras`, `hostel_owner`, `hostel_img`) VALUES ('".$hostel_name."', '".$hostel_city."', '".$hostel_address."', '".$hostel_rooms."', '".$hostel_extras."', '".$hostel_owner."', '".$uploaddir."');";
            $result = mysqli_query($conn,$sql);
            if(!$result) {
                die("Error description: " . mysqli_error($conn));
            }
            
            if (move_uploaded_file($hostel_image_temp_name, '../'.$uploaddir)) {
                $_SESSION['error_msg'] = "Your hostel has been successfully sent for review by our team. You will be notified once it gets reviewed.";
                header("Location: ../pages/add-hostel.php");
            } else {
                $_SESSION['error_msg'] = "Error occured while uploading image.";
                header("Location: ../pages/add-hostel.php");
            }
        }
    }

?>