<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "SELECT * FROM project_list where p_id='".$_GET['id']."'";

                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            $row = $query->fetch_assoc();
                                $pu=$row['status'];
                                if($pu=="Not Published"){
                                    $status="Published";
                                }
                                else{
                                    $status="Not Published";
                                }
		$update = "UPDATE project_list SET status='$status' WHERE p_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($update)){
			$_SESSION['success'] = 'Project Updated successfully';
		}
		////////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in Updating Project';
		}
	}
	else{
		$_SESSION['error'] = 'Select Project to delete first';
	}

	header('location: index.php');
?>