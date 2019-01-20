<?php

	function getStarsString($rating, $total)
	{
		$stars = "";

		if ($rating >= $total)
		{
			for ($var = 0; $var < $total; $var++)
            	$stars = $stars."<i class='fas fa-star'></i>";
            return $stars;
		}

        for ($var = 0; $var < floor($rating); $var++)
        {
            $stars = $stars."<i class='fas fa-star'></i>";
            $total--;
        }
        if (floor($rating) == $rating)
            $stars = $stars."<i class='far fa-star'></i>";
        else
            $stars = $stars."<i class='fas fa-star-half-alt'></i>";
        $total--;
        for ($var = 0; $var < $total; $var++)
            $stars = $stars."<i class='far fa-star'></i>";

        return $stars;
	}

	function getHostelImagesArray($conn, $id)
	{
		$imageArr = array();

		$sql = "SELECT hostel_img FROM hostels WHERE hostel_id='$id'";
	    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	    array_push($imageArr, $result['hostel_img']);

	    $sql = "SELECT hostel_pic FROM hostels_images WHERE hostel_id='$id'";
	    $result = mysqli_query($conn, $sql);
	    $count = mysqli_num_rows($result);
	    $assoc = mysqli_fetch_assoc($result);

	    for ($var = 0; $var < $count; $var++)
	    	array_push($imageArr, $assoc['hostel_pic']);

	    return $imageArr;
	}

	function getHostelContact($conn, $id)
	{
		$sql = "SELECT hostel_owner FROM hostels WHERE hostel_id='$id'";
	    $result = mysqli_query($conn, $sql);
	    $count = mysqli_num_rows($result);
	    if ($count == 0)
	    	return "";
	    $ownerid = mysqli_fetch_assoc($result)['hostel_owner'];

	    $sql = "SELECT user_email FROM users WHERE user_id='$ownerid'";
	    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_email'];

	    return $result;
	}

    function validateAndUpldoad($hostel_name, $hostel_city, $hostel_address, $hostel_rooms, $hostel_extras, $hostel_image_name, $hostel_image_temp_name)
    {
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
            uploadHostel($hostel_name, $hostel_city, $hostel_address, $hostel_rooms, $hostel_extras, $hostel_image_name, $hostel_image_temp_name);
        }
    }

    function uploadHostel($hostel_name, $hostel_city, $hostel_address, $hostel_rooms, $hostel_extras, $hostel_image_name, $hostel_image_temp_name)
    {
        $hostel_owner = $_SESSION['user_id'];
        $uploaddir = 'pages/';

        global $conn;
        $sql = "INSERT INTO `hostels`(`hostel_name`, `hostel_city`, `hostel_address`, `hostel_rooms`, `hostel_extras`, `hostel_owner`, `hostel_img`) VALUES ('".$hostel_name."', '".$hostel_city."', '".$hostel_address."', '".$hostel_rooms."', '".$hostel_extras."', '".$hostel_owner."', '".$hostel_image_name."');";
        $result = mysqli_query($conn,$sql);
        if(!$result) {
            die("Error description: " . mysqli_error($conn));
        }
        
        $hostel_id = $conn->insert_id;
        
        $uploadfile = $uploaddir.$hostel_id."_".$hostel_image_name;
        if (move_uploaded_file($hostel_image_temp_name, $uploadfile)) {
            $_SESSION['error_msg'] = "your hostel has successfully added";
            header("Location: ../pages/add-hostel.php");
        } else {
            $_SESSION['error_msg'] = "Error occured while uploading data";
            header("Location: ../pages/add-hostel.php");
        }
    }
?>