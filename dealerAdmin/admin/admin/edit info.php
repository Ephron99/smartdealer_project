<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$short_d = $_POST['short_d'];
		$more_d = $_POST['more_d'];
		$sql = "UPDATE system_info SET short_desc = '$short_d', more_desc = '$more_d', short_name = '$name' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success2'] = 'Project updated successfully';
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