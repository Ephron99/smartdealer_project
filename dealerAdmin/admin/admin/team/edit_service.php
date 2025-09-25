<?php
include 'db_connect.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $qry = $conn->query("SELECT * FROM services WHERE id=$id");
    $row = $qry->fetch_assoc();
    ?>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Image</label><br>
        <img src="uploads/<?php echo $row['image']; ?>" width="100"><br><br>
        <input type="file" name="image" class="form-control">
    </div>
    <?php
}
?>
