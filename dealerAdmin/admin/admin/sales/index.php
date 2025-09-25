<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">System Information</h3>
        <div class="card-tools">
            <?php
                if(isset($_SESSION['error'])){
                    echo "
                    <div class='alert alert-danger text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['error']."
                    </div>
                    ";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success2'])){
                    echo "
                    <div class='alert alert-success text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['success2']."
                    </div>
                    ";
                    unset($_SESSION['success2']);
                }
            ?>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-bordered table-stripped">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="20%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>System Name</th>
                        <th>Short Description</th>
                        <th>More Description</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("SELECT * FROM `system_info`");
                    while($row = $qry->fetch_assoc()):
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $row['short_name'] ?></td>
                            <td><?php echo $row['short_desc'] ?></td>
                            <td><?php echo $row['more_desc'] ?></td>
                            <td class="text-center">
                                <img src="uploads/system/<?php echo $row['logo']; ?>" alt="Image" width="50" height="40">
                            </td> 
                            <td align="center">
                                <button type="button" class="btn btn-sm btn-primary editBtn"
                                    data-id="<?php echo $row['id']; ?>"
                                    data-name="<?php echo $row['short_name']; ?>"
                                    data-sdesc="<?php echo $row['short_desc']; ?>"
                                    data-mdesc="<?php echo $row['more_desc']; ?>"
                                    data-logo="<?php echo $row['logo']; ?>">
                                    <span class="fa fa-edit"></span> Edit
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Edit System Information</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">

            <div class="form-group">
                <label>System Name</label>
                <input type="text" name="short_name" id="edit_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_desc" id="edit_sdesc" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>More Description</label>
                <textarea name="more_desc" id="edit_mdesc" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
                <img id="current_logo" src="" width="80" class="mt-2">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update_system" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
// Handle Update
if(isset($_POST['update_system'])){
    $id = $_POST['id'];
    $short_name = $_POST['short_name'];
    $short_desc = $_POST['short_desc'];
    $more_desc = $_POST['more_desc'];

    // Handle logo upload if new file is selected
    $logo = $_FILES['logo']['name'];
    if(!empty($logo)){
        $target = "uploads/system/".basename($logo);
        move_uploaded_file($_FILES['logo']['tmp_name'], $target);
        $sql = "UPDATE system_info SET short_name='$short_name', short_desc='$short_desc', more_desc='$more_desc', logo='$logo' WHERE id=$id";
    } else {
        $sql = "UPDATE system_info SET short_name='$short_name', short_desc='$short_desc', more_desc='$more_desc' WHERE id=$id";
    }

    if($conn->query($sql)){
        $_SESSION['success2'] = "System Information updated successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong!";
    }
    echo "<script>window.location.href=window.location.href;</script>";
}
?>

<script>
$(document).ready(function(){
    $('.editBtn').on('click', function(){
        $('#edit_id').val($(this).data('id'));
        $('#edit_name').val($(this).data('name'));
        $('#edit_sdesc').val($(this).data('sdesc'));
        $('#edit_mdesc').val($(this).data('mdesc'));
        $('#current_logo').attr("src", "uploads/system/" + $(this).data('logo'));
        $('#editModal').modal('show');
    });
});
</script>

<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Sales Record permanently?","delete_sale",[$(this).attr('data-id')])
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_sale($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sale",
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