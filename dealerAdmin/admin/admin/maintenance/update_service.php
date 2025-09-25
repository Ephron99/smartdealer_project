<?php
include 'db_connect.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = "";

    if(!empty($_FILES['image']['name'])){
        $image = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);
        $conn->query("UPDATE services SET name='$name', description='$description', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE services SET name='$name', description='$description' WHERE id=$id");
    }
    header("Location: services_list.php"); // change to your file
}
?>
