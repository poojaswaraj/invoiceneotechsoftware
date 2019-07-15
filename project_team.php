<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];

	if($rec_id = isset($_GET['id']) ? $_GET['id'] : '')
	{
		$row=mysql_query("SELECT b.pro_name,c.name as emp_name, a.* FROM `project_team` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_employee c ON c.id=a.emp_id WHERE a.id=$rec_id")or die(mysql_error($connection));
		$data=mysql_fetch_array($row);
	}
	else{
		$data['pro_name']='';
		$data['emp_name']='';
		$data['job_title']='';
		$data['start_date']='';
		$data['end_date']='';
	}
	
?>
<div class="row">
	<h3> Project Team</h3><hr>

	<div class="col-lg-12">
		<h4>Project Team</h4>
		<form id="frm_proteam" name="frm_proteam" autocomplete="off" method="POST" >
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

			<div class="col-md-4">
				<label>Project <span class="required_field">*</span></label>	
				<select class="form-control" name="pro_name" id="pro_name" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT b.* FROM project_team a INNER JOIN new_project b ON a.pro_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['pro_name']; ?></option>
				<?php 
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
					  	while($row=mysql_fetch_array($query))
					  	{

				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } }else{ ?>

					<option value="">Select Project</option>
				<?php 
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
					  	while($row=mysql_fetch_array($query))
					  	{

				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } } ?>
					
				</select>
			</div>

			<div class="col-md-4">
				<label>User <span class="required_field">*</span></label>	
				<select class="form-control" name="sel_emp" id="emp_name" required="">
					<?php 
						if (!empty($rec_id)) {
						
						$query = mysql_query("SELECT a.* FROM user_profile a INNER JOIN project_team b ON a.id=b.emp_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
					 	 $row=mysql_fetch_array($query);
					  	
					 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php 
						$query = mysql_query("SELECT * FROM user_profile")or die(mysql_error($connection));
					  	while($row=mysql_fetch_array($query))
					  	{
					?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } }else{ ?>
					<option value="">Select User</option>
					<?php 
						$query = mysql_query("SELECT * FROM user_profile")or die(mysql_error($connection));
					  	while($row=mysql_fetch_array($query))
					  	{

					 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } } ?>
				</select>
			</div>
			<div class="col-md-4">
				<label>Role</label>
				<input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $data['job_title']; ?>">
			</div>
			
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>Start Date <span class="required_field">*</span></label>
				<input type="date" class="form-control" name="start_dt" id="start_dt" data-placeholder="Start Date" required aria-required="true" value="<?php echo $data['start_date']; ?>">
			</div>

			<div class="col-md-4">
					<label>End Date <span class="required_field">*</span></label>
				<input type="date" name="end_dt" id="end_dt" class="form-control" data-placeholder="End Date" required aria-required="true" value="<?php echo $data['end_date']; ?>" />
			</div>
			<div class="panel-body"></div>
			
			<div class="col-md-4">
				<?php 
					if (empty($rec_id)) {
				 ?>
				<button name="btn_projectteam" id="btn_projectteam" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
				<?php }else{ ?>
				<button name="btn_project_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>

				<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>
	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Porject Team List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Project Name</th>
			  <th>User Name</th>
			  <th>Role</th>
			  <th>Start Date</th>
			  <th>End Date</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$sql=mysql_query("SELECT c.name as emp_name,b.pro_name,a.* FROM `project_team` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN user_profile c ON c.id=a.emp_id")or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($sql))
		  	{	
		  		$sr_no++;
		  		$id=$row['id'];

		   ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['emp_name']; ?></td>
			  <td><?php echo $row['job_title']; ?></td>
			  <td><?php echo $row['start_date']; ?></td>
			  <td><?php echo $row['end_date']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=project_team&id=<?php echo $id;?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=project_team&id=<?php echo $id;?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  <?php } ?>|
			  	<a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a>
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
			    <h4 class="modal-title" align="center">Delete Project Team</h4>
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

<!-- Insert Script -->
<script>

$("#delete_btn").click(function(e)
{ 
    var id=$('#del_id').val();
	e.preventDefault();

    $.ajax({
	            url:'delete_project_team.php',
	            type: "POST",
	            data: {
	                   id:id  
	            },
	            success: function(data)
                {
                    if(data==1)
                    {
                       	swal({
							  position: 'top-right',
							      type: 'success',
								  title: 'Deleted Successfully !!!',
								  showConfirmButton: false,
								  timer: 1500
							})
					  	window.setTimeout(function()
					    { 
							window.location.reload();
						} ,1500);
                    }                          
                }
            });
    })

$('form#frm_proteam').submit(function(e){

    e.preventDefault();

	if(document.pressed == 'save')
	{
  	    $("button#btn_projectteam").button('loading');
           $.ajax({
					data:$("#frm_proteam").serialize(),
					type:"POST",
					url:'insert_team_project.php',

					success: function(data)
					{
						$("button#btn_projectteam").button('reset');
						 
						if(data==1) 
						{
						   swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'New Project Team Added',
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
						else if(data==3)
						{
							$('#end_dt').css('borderColor','red');
							$('#msg').html('End Date Must Be Greter Than Start Date.');
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
						data:$("#frm_proteam").serialize(),
						type:"POST",
						url:'update_project_team.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
							{
								// alert('Updated Successfully !!!');
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Project Team info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=project_team";
								 	} ,1500);
				
							}
							else if(data==3)
							{
								// alert('Updated Successfully !!!');
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Project info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=project_team";
								 	} ,1500);
							}
							else if(data==2)
							{
								// alert('Error....');
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
							else if(data==4)
							{
								$('#end_dt').css('borderColor','red');
								$('#msg').html('End Date Must Be Greter Than Start Date.');
								$('#msg').css('color','red');
								
								return false;
							} 
						}
				   });

	    }
	  return true;

});

</script>