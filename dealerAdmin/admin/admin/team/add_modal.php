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
			<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name ="id" value="">
		<div class="form-group">
			<label for="name" class="control-label">Service Name</label>
			<input name="name" id="name" class="form-control rounded-0" value="">
		</div>
		<div class="form-group">
			<label for="address" class="control-label">Description</label>
			<textarea name="desc" id="desc" cols="30" rows="2" class="form-control form no-resize"></textarea>
		</div>
		<div class="form-group">
			<label for="cperson" class="control-label">Image</label>
			<input type="file" name="file_document" id="file" class="form-control rounded-0" value="">
		</div>
		
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>