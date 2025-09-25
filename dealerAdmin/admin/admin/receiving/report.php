<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload Report</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Select File:</label>
        <input type="file" name="file_document" id="file" required><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required><br>
        <label for="user">User:</label>
        <input type="text" name="user" id="user" required><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>





<?php
// Include database connection
include_once('connection.php');

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file_document'])) {
    // File upload directory
    $targetDir = "uploads/";
    // Get file name
    $fileName = basename($_FILES['file_document']['name']);
    // File path
    $targetFilePath = $targetDir . $fileName;
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
            $sql = "INSERT INTO reports (file_document, caption, description, user) VALUES ('$fileName', '$caption', '$description', '$pid')";
            if(mysqli_query($conn, $sql)){
                echo "File uploaded successfully.";
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
