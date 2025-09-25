<?php
require_once('./../../config.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $qry = $conn->query("SELECT * FROM services WHERE id = $id");
    if($qry->num_rows > 0){
        $row = $qry->fetch_assoc();
        ?>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <p><strong>Image:</strong><br>
            <img src="uploads/<?php echo $row['image']; ?>" width="200">
        </p>
        <?php
    } else {
        echo "<p>Service not found!</p>";
    }
}
?>
