<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['name'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$sql = "UPDATE project_list SET Project_name = '$firstname', service = '$lastname', costomer = '$address' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating Project';
		}
	}
	else{
		$_SESSION['error'] = 'Select Project to edit first';
	}

	header('location: index.php');

?>