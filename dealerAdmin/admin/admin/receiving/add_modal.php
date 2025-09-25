<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Upload Report</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col-sm-4">
						<label for="file">Select File:</label>
					</div>
					<div class="col-sm-8">
						<input type="file" name="file_document" id="file" required><br>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label for="file">Caption:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="caption" required><br>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						 <label for="description">Description:</label>
					</div>
					<div class="col-sm-8">
						<textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
						<br>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label for="user">Project:</label>
					</div>
					<div class="col-sm-8">
						<select name="pid" id="supplier_id" class="custom-select select2">
                            <option <?php echo !isset($supplier_id) ? 'selected' : '' ?> disabled></option>
                            <?php 
                            //include('connection.php');
                            $supplier = $conn->query("SELECT * FROM `project_list` order by `Project_name` asc");
                            while($row=$supplier->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['p_id'] ?>" <?php echo isset($supplier_id) && $supplier_id == $row['p_id'] ? "selected" : "" ?> ><?php echo $row['Project_name'] ?></option>
                            <?php endwhile; ?>
                            </select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Upload</a>
			</form>
            </div>
            
        </div>
    </div>
</div>