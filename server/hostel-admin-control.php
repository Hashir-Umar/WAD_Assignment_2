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
        
    }
    else if (isset($_GET["edit_hostel_id"]) || isset($_GET["cancel_hostel_id"]))
    {
    //     $sql = "delete from `hostels` where hostel_id=".$_GET["delete_hostel_id"];
    //     if(isset($_GET["cancel_hostel_id"]))
    //         $sql = "delete from `pending_hostels` where hostel_id=".$_GET["cancel_hostel_id"];
        
    //         $result = mysqli_query($conn, $sql);
    //     if(!$result) {
    //         $_SESSION['error_msg'] = "Error description: " . mysqli_error($conn);
    //         header("Location: ../pages/hostel-admin.php");
    //     } 
    //     else
    //     {   
    //         $_SESSION['error_msg'] = "Your hostel has successfully deleted..";
            
    //         if(isset($_GET["cancel_hostel_id"])) {
    //             unlink("../".$_GET["cancel_hostel_img"]);
    //             $_SESSION['error_msg'] = "Your hostel request has successfully canceled..";
    //         }
    //         else
    //             unlink("../".$_GET["delete_hostel_img"]);
            
    //         header("Location: ../pages/hostel-admin.php");
    //     }
    }
    
}
?>