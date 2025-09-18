<?php if (isset($_POST['save_report'])) {
    /**/$project_id = $_POST['project_id'];
    $caption = $conn->real_escape_string($_POST['caption']);
    $fileName = $_FILES['file_document']['name'];
    $tmpName = $_FILES['file_document']['tmp_name'];

    // Make sure upload folder exists
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $targetFile = $uploadDir . basename($fileName);

    if (move_uploaded_file($tmpName, $targetFile)) {
        $conn->query("INSERT INTO reports (file_document, caption) 
                      VALUES ( '$fileName', '$caption')");
    }
    header("Location: ".$_SERVER['PHP_SELF']."?id=".$project_id);
    echo "<h2>file saved Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=receiving">Go back</a></p>';
    exit;
}

if (isset($_POST['delete_report_id'])) {
    $rid = $_POST['delete_report_id'];
    $file = $conn->query("SELECT file_document FROM reports WHERE id=$rid")->fetch_assoc();
    if ($file && file_exists("uploads/".$file['file_document'])) {
        unlink("uploads/".$file['file_document']); // delete from folder
    }
    $conn->query("DELETE FROM reports WHERE id=$rid");
    header("Location: ".$_SERVER['PHP_SELF']."?id=".$id);
    echo "<h2>file deleted Successfully!</h2>";
    echo '<p><a href="' . base_url . 'admin/?page=receiving">Go back</a></p>';
    exit;
}
?>
<div class="card card-outline card-primary">

	<div class="card-header">
		
        
		
	<div class="card-body">
        <div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Reports</h3>
        <div class="card-tools">
            <a href="#addReportModal" data-toggle="modal" class="btn btn-primary">
    <span class="glyphicon glyphicon-plus"></span> Create New
</a>

            </div>

        </div>
    </div>

		<div class="col-sm-8 col-sm-offset-2">
            
            <?php
                if(isset($_SESSION['error'])){
                    echo
                    "
                    <div class='alert alert-danger text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['error']."
                    </div>
                    ";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo
                    "
                    <div class='alert alert-success text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['success']."
                    </div>
                    ";
                    unset($_SESSION['success']);
                }
            ?>
            </div>
		
            </div>
		<div class="container-fluid">
        <div class="container-fluid">
        	<div class="row">
					
					
					
					<div class="row mt-4">
    <?php
   
        // Fetch project files from reports table
        $files = $conn->query("SELECT * FROM reports");

        
            while($f = $files->fetch_assoc()) {
                $filePath = "uploads/" . $f['file_document'];
                $caption = !empty($f['caption']) ? $f['caption'] : "No Caption";
                $ext = pathinfo($f['file_document'], PATHINFO_EXTENSION);

                // Icon based on file type
                $icon = "fa-file";
                if(in_array($ext, ['jpg','jpeg','png','gif'])) $icon = "fa-file-image";
                elseif(in_array($ext, ['pdf'])) $icon = "fa-file-pdf";
                elseif(in_array($ext, ['doc','docx'])) $icon = "fa-file-word";
                elseif(in_array($ext, ['xls','xlsx'])) $icon = "fa-file-excel";
                elseif(in_array($ext, ['ppt','pptx'])) $icon = "fa-file-powerpoint";
                elseif(in_array($ext, ['zip','rar'])) $icon = "fa-file-archive";

                echo "
                <div class='col-md-3 mb-3'>
                    <div class='card shadow-sm'>
                        <div class='card-body text-center'>
                            <i class='fas $icon fa-3x text-primary mb-2'></i>
                            <h6 class='card-title'>$caption</h6>
                            <a href='$filePath' target='_blank' class='btn btn-sm btn-outline-success'>
                                <i class='fa fa-download'></i> View
                            </a>
                            <form method='POST' style='display:inline-block'>
                                <input type='hidden' name='delete_report_id' value='".$f['id']."'>
                                <button type='submit' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Delete this file?\")'>
                                    <i class='fa fa-trash'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                ";
            
    }
    ?>
</div>

					
				</div>
        	
                
	
			
		</div>
		</div>
	</div>

</div>
<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="addReportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="addReportModalLabel">Add New Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <!--<input type="hidden" name="project_id" value="<?php echo $id; ?>">
-->
          <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="caption" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="file_document">Upload File</label>
            <input type="file" name="file_document" id="file_document" class="form-control-file" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="save_report" class="btn btn-primary">Save Report</button>
        </div>
      </form>

    </div>
  </div>
</div>


