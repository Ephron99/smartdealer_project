<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Publications</h3>
        <div class="card-tools">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#newPublicationModal" 
               class="btn btn-flat btn-primary">
               <span class="fas fa-plus"></span> Create New
            </a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Author</th>
						<th>Description</th>
						<th>Date</th>
						<th>File</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$qry = $conn->query("SELECT * FROM pubulication ORDER BY id DESC");
					$i = 1;
					while($row = $qry->fetch_assoc()):
					?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $row['title'] ?></td>
						<td><?php echo $row['author'] ?></td>
						<td><?php echo $row['description'] ?></td>
						<td><?php echo date("M d, Y", strtotime($row['created_date'])) ?></td>
						<td>
							<?php if(!empty($row['image'])): ?>
								<?php echo $row['image'] ?><a href="uploads/publications/<?php echo $row['image'] ?>" target="_blank" class="btn btn-sm btn-info">View</a>
							<?php else: ?>
								<span class="text-muted">No file</span>
							<?php endif; ?>
						</td>
						<td>
							<form method="POST" style="display:inline;">
								<input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
								<button type="submit" name="delete_publication" class="btn btn-sm btn-danger" onclick="return confirm('Delete this publication?')">Delete</button>
							</form>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal: Add New Publication -->
<div class="modal fade" id="newPublicationModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Add New Publication</h5>
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control" rows="4" required></textarea>
					</div>
					<div class="form-group">
						<label>Date</label>
						<input type="date" name="pub_date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Upload File</label>
						<input type="file" name="file_document" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="save_publication" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
// --- HANDLE SAVE ---
if (isset($_POST['save_publication'])) {
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$pub_date = $_POST['pub_date'];

	$filename = "";
	if (!empty($_FILES['file_document']['name'])) {
		$filename = time().'_'.basename($_FILES['file_document']['name']);
		move_uploaded_file($_FILES['file_document']['tmp_name'], 'uploads/publications/'.$filename);
	}

	$conn->query("INSERT INTO pubulication (title, author,description, created_date, image) 
	              VALUES ('$title','$author','$description','$pub_date','$filename')");
	echo "<script>location.href=location.href;</script>";
}

// --- HANDLE DELETE ---
if (isset($_POST['delete_publication'])) {
	$id = $_POST['delete_id'];
	$conn->query("DELETE FROM pubulication WHERE id = $id");
	echo "<script>location.href=location.href;</script>";
}
?>

<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Received Orders permanently?","delete_receiving",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("Receiving Details","receiving/view_receiving.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_receiving($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_receiving",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>