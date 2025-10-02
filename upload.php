<?php


// Include database connection
include_once('connection.php');

// Check if form is submitted
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
    
    // Description
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $pid = $_POST['pid'];

    // Check if file already exists
    if(file_exists($targetFilePath)){
        echo "File already exists.";
    } else {
        // Try to upload file
        if(move_uploaded_file($_FILES['file_document']['tmp_name'], $targetFilePath)){
            // Insert file details into database
            $sql = "INSERT INTO reports (file_document, caption, description, project_id) VALUES ('$fileName', '$caption', '$description', '$pid')";
            if(mysqli_query($conn, $sql)){
                //echo "File uploaded successfully.";
                //$redirect_url = base_url . 'admin/?page=receiving';
                //header("Location: $redirect_url");
                //exit;
                $_SESSION['success'] = 'Report added successfully';
                echo $_SESSION['success'];
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else{
            echo "Error uploading file.";
        }
    }
} else {
    echo "Invalid request.";
}
?>