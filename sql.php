<?php
	define("host" , "localhost");
	define("username", "root");
	define("password", "");
	// define("dbname", "myDb");

	$conn = mysqli_connect(host, username, password);
	

	if (!$conn) {
		die("Connection to the database failed: " . mysqli_error());
	}

	//$sql = "CREATE DATABASE IF NOT EXISTS myDb";
	//mysqli_query($conn, $sql);

	mysqli_select_db($conn, "myDb");

	/*$sql = "CREATE TABLE IF NOT EXISTS users (
	userId int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) NOT NULL UNIQUE,
	email varchar(80) NOT NULL UNIQUE,
	password varchar(255) NOT NULL
	)";*/
?>