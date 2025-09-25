<?php
	session_start();
	include_once('connection.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_FILES['file_document']) && $_FILES['file_document']['error'] === UPLOAD_ERR_OK) {
        // File upload directory
    $targetDir = "uploads/";
    // Get file name
    $fileName = basename($_FILES['file_document']['name']);
    // File path
    $targetFilePath = $targetDir . $fileName;
    } else {
        switch ($_FILES['file_document']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Missing a temporary folder.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Failed to write file to disk.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "A PHP extension stopped the file upload.";
                break;
            default:
                echo "Unknown error occurred.";
                break;
        }
    }
		$firstname = $_POST['firstname'];
		$manager = $_POST['manager'];
		$customer = $_POST['customer'];
		$edate = $_POST['edate'];
		$lastname = $_POST['lastname'];
		$R_link = $_POST['R_link'];
		// Check if file already exists
    if(file_exists($targetFilePath)){
        echo "File already exists.";
    }else {
        // Try to upload file
        if(move_uploaded_file($_FILES['file_document']['tmp_name'], $targetFilePath)){
            
		$sql = "INSERT INTO project_list (Project_name, costomer, manager, service, E_date, report_link, image) VALUES ('$firstname', '$customer', '$manager','$lastname', '$edate', '$R_link', '$fileName')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project added successfully';
			header('location: index.php');
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
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}}}
	

	
?>