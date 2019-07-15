<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
	// this is for edit record 
	if(isset($_GET['id']))
	{
		$rec_id=$_GET['id'];

		$sql = mysql_query("SELECT * FROM mst_task WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
	<h3> Task</h3><hr>
	<div class="col-lg-12">
		<h4>Task Details</h4>
		<form id="frm_task" name="frm_task" autocomplete="off" method="POST" >
			
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

			<div class="col-md-4">
				<label>Description <span class="required_field">*</span></label>
				<input type="description" class="form-control" name="txt_description" id="txt_cleagal_id" placeholder="Description" value="<?php if(isset($rec_id)){echo $data['description'];}else{} ?>" style="text-transform:capitalize;" required="">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-12">
				<?php 
					if(empty($rec_id)){
			 	?>
				<button name="btn_task" id="btn_task" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
				<?php }else{ ?>
				<button name="btn_labour_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
				<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>

	<div class="panel-body"></div>
	<div class="col-lg-12" >
	    <h4>Task List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Description</th>
			  <th>Action</th> 
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$sql = mysql_query("SELECT * FROM mst_task")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=task&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=task&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?> 
			  	<!--| <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a> -->
			  	
			  </td>
			 </tr>
			  <?php } ?> 
		  </tbody>
		</table>
	</div>
</div>
<!--Delete model start here-->
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		 <div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Task</h4>
		  	</div>
			   <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data" id="del_id">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_btn" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div> 
	</div>
</div>
<!-- Delete Script start -->
<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_task.php',
                            type: "POST",
                            data: {
                                   id:id  
                            },
                            success: function(data)
                                {
                                  //alert(data);
                                    if(data==1)
                                    {
                                        swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Record Deleted',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
									  window.setTimeout(function()
									    { 
									     location.reload();
									 	} ,1500);
          								
                                        // window.location.reload();
                                        
                                    }                          
                                }
                        });
        })
</script>
<!-- Insert Script -->
<script>

$('form#frm_task').submit(function(e){

    e.preventDefault();
	
  	if(document.pressed == 'save')
	{
	  	  $("button#btn_task").button('loading');

	        $.ajax({
						data:$("#frm_task").serialize(),
						type:"POST",
						url:'insert_newtask.php',
						success: function(data)
						{
							$("button#btn_task").button('reset');
							if(data==1) 
							{
							   swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'New Task Added',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								     location.reload();
								 	} ,1500);
								
							}
							else if(data==2)
							{
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
							else if(data==4)
							{
								$('#msg').html('Task Alredy Exist');
								$('#msg').css('color','red');
								return false;
							} 
						}
					});
	}
	else
		if(document.pressed == 'update')
	  	{
	  		$("button#update").button('loading');
	  	
		        $.ajax({
							data:$("#frm_task").serialize(),
							type:"POST",
							url:'update_task.php',
							success: function(data)
							{
								$("button#update").button('reset');

								if(data==1)
								{
									swal({
										  position: 'top-right',
		 							      type: 'success',
		  								  title: 'Task info has been Updated',
		  								  showConfirmButton: false,
		  								  timer: 1500
									  })
									  window.setTimeout(function()
									    { 
									      window.location.href= "user_dashboard.php?page=task";
									 	} ,1500);
					
								}
								else if(data==3)
								{
									swal({
										  position: 'top-right',
		 							      type: 'success',
		  								  title: 'Task info has been Updated',
		  								  showConfirmButton: false,
		  								  timer: 1500
									  })
									  window.setTimeout(function()
									    { 
									      window.location.href= "dashboard.php?page=task";
									 	} ,1500);
								}
								else if(data==2)
								{
									$('#msg').html('Please Check Error.');
									$('#msg').css('color','red');
									return false;
								} 
							}
					   });

	    }//end of document pressed 
	  return true;
});

</script>