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
			  `user_account_type` boolean NOT NULL,
			  PRIMARY KEY (`user_id`)
			);';

	if(!mysqli_query($conn, $sql))
		die("users table creation failed");

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
			  `hostel_img` MEDIUMTEXT NOT NULL,
			  	PRIMARY KEY (`hostel_id`),
			  	FOREIGN KEY (`hostel_owner`) REFERENCES `users` (`user_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("hostels table creation failed");

	// table to store universities and their address
	$sql = 'CREATE TABLE IF NOT EXISTS `universities` (
			  `university_id` int(11) NOT NULL AUTO_INCREMENT,
			  `university_name` varchar(60) NOT NULL,
			  `university_city` varchar(30) NOT NULL,
			  `university_address` varchar(100) NOT NULL,
			  	PRIMARY KEY (`university_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("universities table creation failed");

	// table to store hostels nearest to universities
	$sql = 'CREATE TABLE IF NOT EXISTS `hostels_universities` (
			  `hostel_id` int(11) NOT NULL,
			  `university_id` int(11) NOT NULL,
			  	PRIMARY KEY (`hostel_id`, `university_id`),
			  	FOREIGN KEY (`university_id`) REFERENCES `universities` (`university_id`),
			  	FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`hostel_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("hostels_universities table creation failed");
	
	// table to store the pictures of the hostels
	$sql = 'CREATE TABLE IF NOT EXISTS `hostels_images` (
			  `hostel_id` int(11) NOT NULL,
			  `hostel_pic` MEDIUMTEXT NOT NULL,
			  	FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`hostel_id`)
			);';
	if(!mysqli_query($conn, $sql))
		die("hostels_images table creation failed");

	mysqli_close($conn);
	echo "Database created successfully";
?>