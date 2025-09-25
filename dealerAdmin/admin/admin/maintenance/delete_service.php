<?php
include 'db_connect.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $qry = $conn->query("SELECT image FROM services WHERE id=$id");
    $row = $qry->fetch_assoc();
    if(file_exists("uploads/".$row['image'])){
        unlink("uploads/".$row['image']); // delete image too
    }
    $conn->query("DELETE FROM services WHERE id=$id");
}
?>
