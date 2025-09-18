<?php

// --- CREATE SERVICE ---
if (isset($_POST['create_service'])) {
    $name = $_POST['name'];
     $position = $_POST['position'];
    $desc = $_POST['description'];

    $img_name = "";
    if (!empty($_FILES['image']['name'])) {
        $img_name = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img_name);
    }

    $conn->query("INSERT INTO team (name, position, description, image) VALUES ('$name', '$position', '$desc', '$img_name')");
     
     echo "<h2>Submitted Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=team">Go back</a></p>';


    exit;
}
// --- DELETE SERVICE ---
if (isset($_POST['delete_service'])) {
    $id = $_POST['delete_id'];
    $conn->query("DELETE FROM team WHERE id = $id");
     header("Location: " . base_url . "admin/?page=team");
      echo "<h2>deleted Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=team">Go back</a></p>';
    exit;
}

// --- UPDATE SERVICE ---
if (isset($_POST['update_service'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $position = $_POST['edit_position'];
    $desc = $_POST['edit_description'];

    // Handle Image Upload
    if (!empty($_FILES['edit_image']['name'])) {
        $img_name = time() . "_" . $_FILES['edit_image']['name'];
        move_uploaded_file($_FILES['edit_image']['tmp_name'], "uploads/".$img_name);
        $conn->query("UPDATE services SET name='$name', description='$desc', image='$img_name' WHERE id=$id");
    } else {
        $conn->query("UPDATE team SET name='$name', position='$position', description='$desc' WHERE id=$id");
    }

     header("Location: " . base_url . "admin/?page=team");
      echo "<h2>Updated Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=team">Go back</a></p>';
    exit;
}
?>


<div class="card card-outline card-primary">
	<div class="card-header d-flex justify-content-between align-items-center">
		<h3 class="card-title">List of Smart Dealer Team</h3>
		<a href="#addnew" data-toggle="modal" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span>Create New
        </a>
	</div>

	<div class="card-body">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Names</th>
					<th>Position</th>
					<th>Description</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 1;
				$qry = $conn->query("SELECT * from `team` order by `id` asc");
				while($row = $qry->fetch_assoc()):
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['position'] ?></td>
					<td><?php echo $row['description'] ?></td>
					<td>
					    <img src="uploads/<?php echo $row['image']; ?>" width="60" height="50">
					</td>
					<td>
					    <div class="btn-group">
					        <button class="btn btn-sm btn-info viewBtn" 
					            data-id="<?php echo $row['id']; ?>" 
					            data-name="<?php echo $row['name']; ?>"
					            data-desc="<?php echo $row['description']; ?>"
					            data-image="<?php echo $row['image']; ?>">
					            View
					        </button>
					        <button class="btn btn-sm btn-primary editBtn" 
					            data-id="<?php echo $row['id']; ?>" 
					            data-name="<?php echo $row['name']; ?>"
					            data-desc="<?php echo $row['description']; ?>"
					            data-image="<?php echo $row['image']; ?>">
					            Edit
					        </button>
					        <button class="btn btn-sm btn-danger deleteBtn" 
					            data-id="<?php echo $row['id']; ?>">
					            Delete
					        </button>
					    </div>
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- VIEW MODAL -->
<div class="modal fade" id="viewModal">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <h4 id="viewName"></h4>
            <p id="viewDesc"></p>
            <img id="viewImage" src="" class="img-fluid">
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <form method="POST" enctype="multipart/form-data" class="modal-content p-3">
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="form-group">
                <label>Names</label>
                <input type="text" name="edit_name" id="edit_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Positin</label>
                <input type="text" name="edit_position" id="edit_position" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="edit_description" id="edit_description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Image (leave empty if not changing)</label>
                <input type="file" name="edit_image" class="form-control">
                <img id="editPreview" src="" class="img-fluid mt-2" width="100">
            </div>
            <button type="submit" name="update_service" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <form method="POST" class="modal-content p-3">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5>Are you sure you want to delete this service?</h5>
            <button type="submit" name="delete_service" class="btn btn-danger">Yes, Delete</button>
        </form>
    </div>
</div>
<!-- CREATE NEW MODAL -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <form method="POST" enctype="multipart/form-data" class="modal-content p-3">
            <h4>Create New Member</h4>
            <div class="form-group">
                <label>Names</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Position</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" name="create_service" class="btn btn-success">Save</button>
        </form>
    </div>
</div>


<script>
$(document).ready(function(){
    // View
    $(".viewBtn").click(function(){
        $("#viewName").text($(this).data("name"));
        $("#viewDesc").text($(this).data("desc"));
        $("#viewImage").attr("src","uploads/"+$(this).data("image"));
        $("#viewModal").modal("show");
    });

    // Edit
    $(".editBtn").click(function(){
        $("#edit_id").val($(this).data("id"));
        $("#edit_name").val($(this).data("name"));
        $("#edit_position").val($(this).data("position"));
        $("#edit_description").val($(this).data("desc"));
        $("#editPreview").attr("src","uploads/"+$(this).data("image"));
        $("#editModal").modal("show");
    });

    // Delete
    $(".deleteBtn").click(function(){
        $("#delete_id").val($(this).data("id"));
        $("#deleteModal").modal("show");
    });
});
</script>
