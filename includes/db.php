<?php
	 if(!isset($_SESSION)) 
	 { 
		ob_start();
		session_start();
	 } 
	$DbPath = 'localhost';
	$DbUsername = 'root';
	$DbPassword = '';
	$DbName = 'handout_2023';
	$conn = mysqli_connect($DbPath,$DbUsername,$DbPassword,$DbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
	mysqli_set_charset( $conn, 'utf8');
?>