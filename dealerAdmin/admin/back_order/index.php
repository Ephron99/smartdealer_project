<div class="card card-outline card-primary">
	<div class="card-header">
		<!-- <h3 class="card-title">Meeting</h3> -->
        <div class="card-tools">
        	<form>
				<input type="file" name="">
				<button class="btn btn-flat btn-primary"><span class="fas fa-plus">Add PFD File</button>
			</form>
			
		</div>
		<div class="">
        	
			<a href="<?php echo base_url ?>admin/?page=back_order/manage_bo" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New Meeting  </a>
			
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="20%">
                        <col width="40%">
                        
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Meeting Title</th>
                            <th>Remarked</th>
                            
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $qry = $conn->query("SELECT * FROM `meetin_tbl`  order by `date_created` desc");
                        while($row = $qry->fetch_assoc()):
                            
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['decisions'] ?></td>
                                
                                
                                <td align="center">
                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                    <?php if($row['status'] == 0): ?>

                                        <a class="dropdown-item" href="<?php echo base_url.'admin?page=receiving/manage_receiving&bo_id='.$row['id'] ?>" data-id="<?php echo $row['id'] ?>"><span class="fa fa-boxes text-dark"></span> Receive</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                        <a class="dropdown-item" href="<?php echo base_url.'admin?page=back_order/view_bo&id='.$row['id'] ?>" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="row">
					
						<?php
                            include_once('connection.php');
                            $sql = "SELECT * FROM reports";

                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $file_path = $row['file_document'];
						    echo "<div class='col-sm-4'><div class='card-header'>";
						    echo "<a href='$file_path' download>" . basename($file_path) . "</a>"; // Display the filename and create a download link
						    echo "<br><h2 class=''>".$row['caption']."</h2>
						    <br><h5 class='card-title'>(".$row['description'].")</h5></div></div>";}?>
					
					
				</div>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Back Order permanently?","delete_bo",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("Payment Details","transaction/view_payment.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_bo($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_bo",
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