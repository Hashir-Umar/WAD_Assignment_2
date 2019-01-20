<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$conn = mysqli_connect($host, $username, $password);

	$sql = "CREATE DATABASE IF NOT EXISTS hostel_db";
	mysqli_query($conn, $sql);
	mysqli_close($conn);

	require_once 'database_connection.php';
		
	// table to store user data
	$sql = 'CREATE TABLE IF NOT EXISTS `users` (
			  `user_id` int(11) NOT NULL AUTO_INCREMENT,
			  `user_email` varchar(30) NOT NULL,
			  `user_password` varchar(255) NOT NULL,
			  `user_account_type` TINYINT NOT NULL,
			  PRIMARY KEY (`user_id`)
			);';

	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));

	// table to store user pending users data
	$sql = 'CREATE TABLE IF NOT EXISTS `pending_users` (
		`user_id` int(11) NOT NULL AUTO_INCREMENT,
		`user_email` varchar(30) NOT NULL,
		`user_password` varchar(255) NOT NULL,
		`user_account_type` TINYINT NOT NULL,
		PRIMARY KEY (`user_id`)
	  );';

	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));
	else 
	{
		$sql = "INSERT INTO `pending_users`
		( user_email, user_password, user_account_type )
		VALUES ('admin@test.com', '123', 2);";

		$result = mysqli_query($conn, $sql);
		if(!$result) {
			die("Error description: " . mysqli_error($conn));
		} 
	}

	//table to store hostel data
	$sql = 'CREATE TABLE IF NOT EXISTS `hostels` (
			  `hostel_id` int(11) NOT NULL AUTO_INCREMENT,
			  `hostel_name` varchar(60) NOT NULL,
			  `hostel_city` varchar(30) NOT NULL,
			  `hostel_address` varchar(100) NOT NULL,
			  `hostel_rooms` int(3) NOT NULL,
			  `hostel_extras` varchar(255) NOT NULL,
			  `hostel_owner` int(11) NOT NULL,
			  `hostel_rating` float NOT NULL,
			  `hostel_img` TEXT NOT NULL,
			  	PRIMARY KEY (`hostel_id`),
			  	FOREIGN KEY (`hostel_owner`) REFERENCES `users` (`user_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));

	//table to store hostel pending data
	$sql = 'CREATE TABLE IF NOT EXISTS `pending_hostels` (
		`hostel_id` int(11) NOT NULL AUTO_INCREMENT,
		`hostel_name` varchar(60) NOT NULL,
		`hostel_city` varchar(30) NOT NULL,
		`hostel_address` varchar(100) NOT NULL,
		`hostel_rooms` int(3) NOT NULL,
		`hostel_extras` varchar(255) NOT NULL,
		`hostel_owner` int(11) NOT NULL,
		`hostel_rating` float NOT NULL,
		`hostel_img` TEXT NOT NULL,
			PRIMARY KEY (`hostel_id`),
			FOREIGN KEY (`hostel_owner`) REFERENCES `users` (`user_id`)
	  );';
	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));

	// table to store universities and their address
	$sql = 'CREATE TABLE IF NOT EXISTS `universities` (
			  `university_id` int(11) NOT NULL AUTO_INCREMENT,
			  `university_name` varchar(60) NOT NULL,
			  `university_city` varchar(30) NOT NULL,
			  `university_address` varchar(100) NOT NULL,
			  	PRIMARY KEY (`university_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));

	// table to store hostels nearest to universities
	$sql = 'CREATE TABLE IF NOT EXISTS `hostels_universities` (
			  `hostel_id` int(11) NOT NULL,
			  `university_id` int(11) NOT NULL,
			  	PRIMARY KEY (`hostel_id`, `university_id`),
			  	FOREIGN KEY (`university_id`) REFERENCES `universities` (`university_id`),
			  	FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`hostel_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));
	
	// table to store the pictures of the hostels
	$sql = 'CREATE TABLE IF NOT EXISTS `hostels_images` (
			  `hostel_id` int(11) NOT NULL,
			  `hostel_pic` TEXT NOT NULL,
			  	FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`hostel_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("Error description: " . mysqli_error($conn));
	
	////////////////////////////////////// adding dummy data ///////////////////////////////////////
	
	include_once("functions.php");
	// adding dummy data to users table
	if(isTableEmpty($conn, 'users'))
	{
		$sql = "INSERT INTO `users`
		( user_email, user_password, user_account_type )
		VALUES
		('user@test.com', '123', 1), 
		('user1@test.com', '123', 1), 
		('user2@test.com', '123', 1),
		('owner@test.com', '123', 3);";

		if(!mysqli_query($conn, $sql)) {
			die("Error description: " . mysqli_error($conn));
		} 
	}

	// adding dummy data to pending hostel table
	if(isTableEmpty($conn, 'pending_hostels'))
	{
		$sql = "INSERT INTO `pending_hostels`
			( hostel_name, hostel_city, hostel_address, hostel_rooms, hostel_extras, hostel_owner, hostel_img )
			VALUES
			('hostel1', 'Lahore', 'Johar town 12', '12', 'AC, fridge', '2', 'src/hostel_images/1_1.jpg'), 
			('hostel2', 'Islamabad', 'Johar town 92', '9', 'AC, fridge', '2', 'src/hostel_images/1_2.jpg'), 
			('hostel3', 'Karachi', 'Johar town 102', '3', 'AC, fridge', '2', 'src/hostel_images/1_3.jpg');";

			$result = mysqli_query($conn, $sql);
			if(!$result) {
				die("Error description: " . mysqli_error($conn));
			} 
	}

	// adding dummy data to hostel table
	if(isTableEmpty($conn, 'hostels'))
	{
		$sql = "INSERT INTO `hostels`
			( hostel_name, hostel_city, hostel_address, hostel_rooms, hostel_extras, hostel_owner, hostel_img )
			VALUES
			('hostel4', 'Peshawar', 'Murree town 53', '12', 'Double bed', '2', 'src/hostel_images/1_4.jpg'), 
			('hostel5', 'Peshawar', 'Murree town 345', '9', 'heater, Double bed', '2', 'src/hostel_images/1_5.jpg'), 
			('hostel6', 'Quetta', 'Murree town 123', '3', 'AC, heater, Double bed', '2', 'src/hostel_images/1_6.jpg');";

			$result = mysqli_query($conn, $sql);
			if(!$result) {
				die("Error description: " . mysqli_error($conn));
			} 
	}

	mysqli_close($conn);
?>