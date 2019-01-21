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

	function getHostelContactPending($conn, $id)
	{
		$sql = "SELECT hostel_owner FROM pending_hostels WHERE hostel_id='$id'";
	    $result = mysqli_query($conn, $sql);
	    $count = mysqli_num_rows($result);
	    if ($count == 0)
	    	return "";
	    $ownerid = mysqli_fetch_assoc($result)['hostel_owner'];

	    $sql = "SELECT user_email FROM users WHERE user_id='$ownerid'";
	    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_email'];

	    return $result;
	}

	function getNewHostelID($conn)
	{
		$sql = "SELECT hostel_id FROM hostels ORDER BY hostel_id DESC LIMIT 1;";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0)
			return 0;
		return mysqli_fetch_assoc($result)['hostel_id']+1;
	}

	function isTableEmpty($conn, $table_name)
	{
		$sql = "select * from ".$table_name;
		$result = mysqli_query($conn, $sql);
		if(!$result)
			die("Error description: " . mysqli_error($conn));
	
		if(mysqli_num_rows($result) == 0)
			return 1;
		
		return 0;
	}
	
	
	function insertData($conn,$fname,$lname,$Gender,$email, $password,$phone_no,$user_account_type)
	{
        $insertQuery = "insert into users (user_email,user_fname,user_lname,user_Gender,user_p_no,user_password,user_account_type)
        values ('$email','$fname', '$lname', '$Gender', '$phone_no','$password', '$user_account_type');";

		$result = mysqli_query($conn,$insertQuery);
		
		if(!$result)
       		die("Error description: " . mysqli_error($conn));
	}

?>