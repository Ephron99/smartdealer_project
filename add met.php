<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$created_date = $_POST['created_date'];
		$decisions = $_POST['decisions'];
		$sql = "INSERT INTO meetin_tbl (title, date_created, decisions) VALUES ('$title', '$created_date', '$decisions')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>