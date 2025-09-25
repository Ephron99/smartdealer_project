<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		if($user_type=="Admin"){
			$user_type=1;
		}
		elseif($user_type=="MD"){
			$user_type=2;
		}
		elseif($user_type=="Technical Director"){
			$user_type=3;
		}
		elseif($user_type=="Draft Manager"){
			$user_type=4;
		}
		$sql = "INSERT INTO users (firstname, middlename, lastname, username, password, type) VALUES ('$fname', '$mname', '$lname','$username', '$password', '$user_type')";

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