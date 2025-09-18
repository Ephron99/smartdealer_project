<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Project Name:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="firstname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Customer Name:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="customer"  required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Project Manager:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="manager" required>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Service:</label>
                            </div>
					<div class="col-sm-8">
						<select name="lastname" id="supplier_id" class="custom-select select2">
                            <option <?php echo !isset($supplier_id) ? 'selected' : '' ?> disabled></option>
                            <?php 
                            $supplier = $conn->query("SELECT * FROM `services` order by `name` asc");
                            while($row=$supplier->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($supplier_id) && $supplier_id == $row['id'] ? "selected" : "" ?> ><?php echo $row['name'] ?></option>
                            <?php endwhile; ?>
                            </select>
                            </div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Start Date:</label>
					</div>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="address" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">End Date:</label>
					</div>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="edate" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Report Link:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="R_link" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Image:</label>
					</div>
					<div class="col-sm-8">
						<input type="file" class="form-control" name="file_document" required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>