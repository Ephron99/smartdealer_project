<?php

// --- CREATE PROJECT ---
if (isset($_POST['create_project'])) {
    $pname = $_POST['Project_name'];
    $pmgr = $_POST['project_manager'];
    $desc = $_POST['description'];
    $service = $_POST['service'];
    $sdate = $_POST['s_date'];
    $edate = $_POST['E_date'];

    // Handle Main Image
    $main_image = "";
    if (!empty($_FILES['main_image']['name'])) {
        $main_image = time() . "_" . $_FILES['main_image']['name'];
        move_uploaded_file($_FILES['main_image']['tmp_name'], "uploads/" . $main_image);
    }

    // Insert project
    $conn->query("INSERT INTO project_list (Project_name, project_manager, description, service, s_date, E_date, main_image, status) 
                  VALUES ('$pname','$pmgr','$desc','$service','$sdate','$edate','$main_image','Not Published')");
    $project_id = $conn->insert_id;

    // Handle Gallery Images
    if (!empty($_FILES['gallery_images']['name'][0])) {
        foreach ($_FILES['gallery_images']['name'] as $key => $value) {
            $img_name = time() . "_" . $_FILES['gallery_images']['name'][$key];
            move_uploaded_file($_FILES['gallery_images']['tmp_name'][$key], "uploads/" . $img_name);
            $conn->query("INSERT INTO project_images (project_id, image) VALUES ('$project_id','$img_name')");
        }
    }

    header("Location: ".$_SERVER['PHP_SELF']);
     echo "<h2>Project Submitted Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=projects">Go back</a></p>';
    exit;
}

// --- UPDATE PROJECT ---
if (isset($_POST['update_project'])) {
    $id = $_POST['id'];
    $pname = $_POST['Project_name'];
    $pmgr = $_POST['project_manager'];
    $desc = $_POST['description'];
    $service = $_POST['edit_service'];
    $sdate = $_POST['edit_s_date'];
    $edate = $_POST['edit_E_date'];

    // Replace main image if uploaded
    if (!empty($_FILES['edit_main_image']['name'])) {
        $main_image = time() . "_" . $_FILES['edit_main_image']['name'];
        move_uploaded_file($_FILES['edit_main_image']['tmp_name'], "uploads/" . $main_image);
        $conn->query("UPDATE project_list 
                      SET Project_name='$pname', project_manager='$pmgr', description='$desc', 
                          service='$service', s_date='$sdate', E_date='$edate', main_image='$main_image' 
                      WHERE p_id=$id");
    } else {
        $conn->query("UPDATE project_list 
                      SET Project_name='$pname', project_manager='$pmgr', description='$desc', 
                          service='$service', s_date='$sdate', E_date='$edate' 
                      WHERE p_id=$id");
    }

    // Add new gallery images
    if (!empty($_FILES['edit_gallery_images']['name'][0])) {
        foreach ($_FILES['edit_gallery_images']['name'] as $key => $value) {
            $img_name = time() . "_" . $_FILES['edit_gallery_images']['name'][$key];
            move_uploaded_file($_FILES['edit_gallery_images']['tmp_name'][$key], "uploads/" . $img_name);
            $conn->query("INSERT INTO project_images (project_id, image) VALUES ('$id','$img_name')");
        }
    }

    header("Location: ".$_SERVER['PHP_SELF']);
     echo "<h2>Project Updated Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=projects">Go back</a></p>';
    exit;
}

// --- DELETE PROJECT ---
if (isset($_POST['delete_project'])) {
    $id = $_POST['delete_id'];
    $conn->query("DELETE FROM project_list WHERE p_id=$id");
    header("Location: ".$_SERVER['PHP_SELF']);
     echo "<h2>Project Deleted Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=projects">Go back</a></p>';
    exit;
}

// --- TOGGLE STATUS ---
if (isset($_POST['toggle_status'])) {
    $id = $_POST['status_id'];
    $status = $_POST['current_status'] == "Published" ? "Not Published" : "Published";
    $conn->query("UPDATE project_list SET status='$status' WHERE p_id=$id");
    header("Location: ".$_SERVER['PHP_SELF']);
     echo "<h2>Status Updated Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=projects">Go back</a></p>';
    exit;
}
?>



<div class="d-flex justify-content-between mb-3">
    <h3>Project List</h3>
    <a href="#addNewProject" data-toggle="modal" class="btn btn-primary">+ Add New Project</a>
</div>

<table id="myTable" class="table table-bordered table-striped" width="100%">
    <thead>
        <th>ID</th>
        <th>ProjectName</th>
        <th>Service</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM project_list p JOIN services s ON s.id=p.service ORDER BY p.p_id DESC";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
                echo "<tr>
                    <td>".$row['p_id']."</td>
                    <td>".$row['Project_name']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['s_date']."</td>
                    <td>".$row['E_date']."</td>
                    <td>".$row['status']."</td>
                    <td>
                        <button class='btn btn-sm btn-primary editBtn'
                            data-id='".$row['p_id']."'
                            data-name='".$row['Project_name']."'
                            data-service='".$row['service']."'
                            data-sdate='".$row['s_date']."'
                            data-edate='".$row['E_date']."'>Edit</button>
                        
                        <button class='btn btn-sm btn-danger deleteBtn'
                            data-id='".$row['p_id']."'>Delete</button>
                        
                        <form method='POST' style='display:inline'>
                            <input type='hidden' name='status_id' value='".$row['p_id']."'>
                            <input type='hidden' name='current_status' value='".$row['status']."'>
                            <button type='submit' name='toggle_status' class='btn btn-sm btn-success'>
                                ".($row['status']=="Published"?"Unpublish":"Publish")."
                            </button>
                        </form>
                    </td>
                </tr>";
            }
        ?>
    </tbody>
</table>

<!-- ADD NEW PROJECT MODAL -->
<div class="modal fade" id="addNewProject">
    <div class="modal-dialog modal-lg">
        <form method="POST" enctype="multipart/form-data" class="modal-content p-3">
            <h4>Add New Project</h4>
            <div class="form-group">
                <label>Project Name</label>
                <input type="text" name="Project_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Project Manager</label>
                <input type="text" name="project_manager" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Service</label>
                <select name="service" class="form-control" required>
                    <?php
                    $services = $conn->query("SELECT * FROM services ORDER BY name ASC");
                    while($s = $services->fetch_assoc()){
                        echo "<option value='".$s['id']."'>".$s['name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="s_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="E_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="main_image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Other Image</label>
            <input type="file" name="gallery_images[]" class="form-control" multiple>

            </div>
            <button type="submit" name="create_project" class="btn btn-success">Save</button>
        </form>
    </div>
</div>


<!-- EDIT PROJECT MODAL -->
<div class="modal fade" id="editProjectModal">
    <div class="modal-dialog modal-lg">
        <form method="POST" enctype="multipart/form-data" class="modal-content p-3">
            <h4>Edit Project</h4>
            <input type="hidden" name="edit_id" id="edit_id">

            <div class="form-group">
                <label>Project Name</label>
                <input type="text" name="edit_Project_name" id="edit_Project_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Project Manager</label>
                <input type="text" name="edit_project_manager" id="edit_project_manager" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="edit_description" id="edit_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Service</label>
                <select name="edit_service" id="edit_service" class="form-control" required>
                    <?php
                    $services = $conn->query("SELECT * FROM services ORDER BY name ASC");
                    while($s = $services->fetch_assoc()){
                        echo "<option value='".$s['id']."'>".$s['name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="edit_s_date" id="edit_s_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="edit_E_date" id="edit_E_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Replace Main Image</label>
                <input type="file" name="edit_main_image" class="form-control">
                <img id="editPreview" src="" width="120" class="mt-2">
            </div>
            <div class="form-group">
                <label>other Image</label>
                <input type="file" name="edit_gallery_images[]" class="form-control" multiple>
            </div>
            <button type="submit" name="update_project" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteProjectModal">
    <div class="modal-dialog">
        <form method="POST" class="modal-content p-3">
            <h5>Are you sure you want to delete this project?</h5>
            <input type="hidden" name="delete_id" id="delete_id">
            <button type="submit" name="delete_project" class="btn btn-danger">Yes, Delete</button>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
    // Edit button click
    $(".editBtn").click(function(){
        $("#edit_id").val($(this).data("id"));
        $("#edit_Project_name").val($(this).data("name"));
        $("#edit_service").val($(this).data("service"));
        $("#edit_s_date").val($(this).data("sdate"));
        $("#edit_E_date").val($(this).data("edate"));
        $("#editProjectModal").modal("show");
    });

    // Delete button click
    $(".deleteBtn").click(function(){
        $("#delete_id").val($(this).data("id"));
        $("#deleteProjectModal").modal("show");
    });
});
</script>
