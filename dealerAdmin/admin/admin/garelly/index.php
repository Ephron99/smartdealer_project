<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT p.*,s.name as supplier FROM purchase_order_list p inner join supplier_list s on p.supplier_id = s.id  where p.id = '{$_GET['id']}'");
    if($qry->num_rows >0){
        foreach($qry->fetch_array() as $k => $v){
            $$k = $v;
        }
    }
}


// --- CREATE PROJECT ---
if (isset($_POST['create_project'])) {
   
    $service = $_POST['service'];
    
    // Handle Main Image
    $main_image = "";
    if (!empty($_FILES['main_image']['name'])) {
        $main_image = time() . "_" . $_FILES['main_image']['name'];
        move_uploaded_file($_FILES['main_image']['tmp_name'], "uploads/" . $main_image);
    }

    // Insert project
    $conn->query("INSERT INTO project_images (project_id , image) 
                  VALUES ('$service'
                  ,'$main_image')");
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
     echo "<h2>Image saved Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=garelly">Go back</a></p>';
    exit;
}

?>
<style>
    select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
        background: #eee;
        box-shadow: none;
    }

    select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h4 class="card-title"><?php echo isset($id) ? "Purchase Order Details - ".$po_code : '' ?></h4>
         <a href="#addNewProject" data-toggle="modal" class="btn btn-primary">+ <span class="glyphicon glyphicon-plus"></span>Add New Project Image</a>
    </div>
    <div class="card-body">
    <?php
    $sql = "SELECT * FROM project_list ORDER BY p_id DESC";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
    ?>
        <div class="project-card mb-4 p-3 border rounded">
            <!-- Project Title -->
            <h4 class="mb-3 text-primary">
                <?php echo htmlspecialchars($row['Project_name']); ?>
            </h4>

            <!-- Main Image -->
            <div class="main-image mb-2">
                <img src="uploads/<?php echo $row['main_image']; ?>" 
                     alt="Main Image" 
                     class="img-fluid rounded shadow" 
                     style="max-width: 250px;">
            </div>

            <!-- Other Images -->
            <div class="other-images d-flex flex-wrap">
                <?php
                $imgs = $conn->query("SELECT * FROM project_images WHERE project_id=" . $row['p_id']);
                while ($g = $imgs->fetch_assoc()) {
                ?>
                    <div class="gallery-img m-1">
                        <img src="uploads/<?php echo $g['image']; ?>" 
                             alt="Gallery Image" 
                             class="img-thumbnail" 
                             style="width: 100px; height: 80px; object-fit: cover;">
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

    <div class="card-footer py-1 text-center">
        
    </div>
</div>
<table id="clone_list" class="d-none">
    <tr>
        <td class="py-1 px-2 text-center">
            <button class="btn btn-outline-danger btn-sm rem_row" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td class="py-1 px-2 text-center qty">
            <span class="visible"></span>
            <input type="hidden" name="item_id[]">
            <input type="hidden" name="unit[]">
            <input type="hidden" name="qty[]">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
        </td>
        <td class="py-1 px-2 text-center unit">
        </td>
        <td class="py-1 px-2 item">
        </td>
        <td class="py-1 px-2 text-right cost">
        </td>
        <td class="py-1 px-2 text-right total">
        </td>
    </tr>
</table>
<!-- ADD NEW PROJECT MODAL -->
<div class="modal fade" id="addNewProject">
    <div class="modal-dialog modal-lg">
        <form method="POST" enctype="multipart/form-data" class="modal-content p-3">
            <h4>Add New Project Image</h4>
           
            <div class="form-group">
                <label>Project</label>
                <select name="service" class="form-control" required>
                    <?php
                    $services = $conn->query("SELECT * FROM project_list ORDER BY Project_name ASC");
                    while($s = $services->fetch_assoc()){
                        echo "<option value='".$s['p_id']."'>".$s['Project_name']."</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="main_image" class="form-control" required>
            </div>
            
            <button type="submit" name="create_project" class="btn btn-success">Save</button>
        </form>
    </div>
</div>


 