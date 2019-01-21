<?php
    session_start();
    include_once('../config.php'); 
    if(!isset($_SESSION['user_account_type']) && $_SESSION['user_account_type'] != 2)
    {
        header("Location: ../index.php");
    }
    else
    {
        include_once "database_connection.php";

        if (isset($_GET["delete_hostel_id"]) || isset($_GET["cancel_hostel_id"]))
        {
            $sql = "delete from `hostels` where hostel_id=".$_GET["delete_hostel_id"];
            if(isset($_GET["cancel_hostel_id"]))
                $sql = "delete from `pending_hostels` where hostel_id=".$_GET["cancel_hostel_id"];
            
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $_SESSION['error_msg'] = "Error description: " . mysqli_error($conn);
                header("Location: ../pages/hostel-admin.php");
            } 
            else
            {   
                $sql = "delete from `hostels_images` where hostel_id=".$_GET["delete_hostel_id"];
                $result = mysqli_query($conn, $sql);
                $_SESSION['error_msg'] = "Your hostel has successfully deleted..";
                
                if(isset($_GET["cancel_hostel_id"])) {
                    unlink("../".$_GET["cancel_hostel_img"]);
                    $_SESSION['error_msg'] = "Your hostel request has successfully canceled..";
                }
                else
                    unlink("../".$_GET["delete_hostel_img"]);
                
                header("Location: ../pages/hostel-admin.php");
            }
        }
        else if(isset($_GET["editHostel"]) || isset($_GET["editHostelPending"]))
        {
            $hostel_name = $_GET["edit_hostel_name"];
            $hostel_city = $_GET["edit_hostel_city"];
            $hostel_address = $_GET["edit_hostel_address"];
            $hostel_rooms = $_GET["edit_hostel_rooms"];
            $hostel_extras = $_GET["edit_hostel_extras"];

            $hostel_city_regex = '/Lahore|Islamabad|Karachi|Faisalabad|Peshawar|Quetta/';
           
            if($hostel_name == ""
            || $hostel_city == ""
            || $hostel_address == ""
            || $hostel_rooms == "") {
                $_SESSION['error_msg'] = "You can not leave any feild empty";
                header("Location: ../pages/hostel-admin.php");
                die();
            }

            if (!preg_match($hostel_city_regex,  $hostel_city))  {
                $_SESSION['error_msg'] = "City name not valid";
                header("Location: ../pages/hostel-admin.php");
            }
            else {
                $hostel_owner = $_SESSION['user_id'];
                $hostel_id = $_GET['edit_hostel_id'];    //hostel id

                global $conn;
                $sql = "UPDATE `hostels` SET `hostel_name`='".$hostel_name."', `hostel_city`='".$hostel_city."', `hostel_address`='".$hostel_address."', `hostel_rooms`='".$hostel_rooms."', `hostel_extras`='".$hostel_extras."' WHERE `hostel_id`=$hostel_id AND `hostel_owner`=$hostel_owner";
                if(isset($_GET["editHostelPending"]))
                    $sql = "UPDATE `pending_hostels` SET `hostel_name`='".$hostel_name."', `hostel_city`='".$hostel_city."', `hostel_address`='".$hostel_address."', `hostel_rooms`='".$hostel_rooms."', `hostel_extras`='".$hostel_extras."' WHERE `hostel_id`=$hostel_id AND `hostel_owner`=$hostel_owner";
                $result = mysqli_query($conn,$sql);
                if(!$result) {
                    die("Error description: " . mysqli_error($conn));
                }
                else
                {
                    $_SESSION['error_msg'] = "Your hostel has been successfully updated";
                    header("Location: ../pages/hostel-admin.php");
                }
            
                
            }
        }        
    }

    
    
?>