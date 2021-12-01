<?php 
	date_default_timezone_set('Asia/Dhaka');

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jit_dev_07_crud";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die( 'Connection Faild: '.$conn->connect_error);
	}