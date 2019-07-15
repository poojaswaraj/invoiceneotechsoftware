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

		$sql = mysql_query("SELECT * FROM daily_labour WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
			$data['date']='';
			$data['cont_id']='';
			$data['type_of_work']='';
			$data['no_labour']='';
		}
?>
<div class="row">
	<h3> Daily Labour</h3><hr>

	<div class="col-lg-12">
		<h4>Daily Labour</h4>
		<form id="frm_labour" name="frm_labour" autocomplete="off" method="POST" >
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

			<div class="col-md-3">
			<label>Date</label>
				<input type="date" name="date" id="date" class="form-control" data-placeholder="Date" required aria-required="true" value="<?php echo $data['date']; ?>" />
			</div>

			<div class="col-md-3">
				<label>Select Contractor</label>
				<select name="txt_con_name" id="txt_con_name" class="form-control" required="">
					<?php 
						if(!empty($rec_id)){
						$sql1=mysql_query("SELECT a.* FROM mst_contractor a INNER JOIN daily_labour b ON a.id=b.cont_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
						$row1=mysql_fetch_array($sql1);

					 ?>
					<option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
					<?php 
						$sql=mysql_query("SELECT * FROM mst_contractor")or die(mysql_error($connection));
						while($row=mysql_fetch_array($sql))
						{
					?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

					<?php } }else{ ?>
					<option value="">Select Contractor</option>
					<?php 
					
						$sql=mysql_query("SELECT * FROM mst_contractor")or die(mysql_error($connection));
						while($row=mysql_fetch_array($sql))
						{
					 ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } } ?>
				</select>
			</div>

			<div class="col-md-3">
				<label>Select Work Type</label>
				<select id="types" name="types" class="form-control" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_task a INNER JOIN daily_labour b ON a.id=b.type_of_work WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['description']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM mst_task")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Work Type</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM mst_task")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>
				<?php } } ?>
					<option value="Other">Other</option>
			</select>
				<input type="text" id="other" name="other_types" style="display: none;" class="form-control" />
			</div>
		
			<div class="col-md-3">
				<label>Number of Labour</label>
				<input type="number" class="form-control" name="no_labour" id="no_labour" placeholder="Number of Labour" value="<?php echo $data['no_labour']; ?>" required="">
			</div>
			<div class="panel-body"></div>
		
			<div class="col-md-4">
			<?php if(empty($rec_id)){ ?>
				<button name="btn_contractor" id="btn_contractor" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
				<button name="btn_contractor_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>
	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Labour List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Date</th>
			  <th>Contrator Name</th>
			  <th>Work Type</th>
			  <th>Number of Labour</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$sql = mysql_query("SELECT b.name,c.description, a.* FROM `daily_labour` a INNER JOIN mst_contractor b ON a.cont_id=b.id INNER JOIN mst_task c ON a.type_of_work=c.id")or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id=$row['id'];
		   ?>
				<tr id="invoice-23">
				  <td><?php echo $sr_no; ?></td>
				  <td><?php echo $row['date']; ?></td>
				  <td><?php echo $row['name']; ?></td>
				  <td><?php echo $row['description']; ?></td>
				  <td><?php echo $row['no_labour']; ?></td>
				  <td>
				  	<a href='dashboard.php?page=daily_labour&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> |
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
			    <h4 class="modal-title" align="center">Delete Daily Labour</h4>
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

<script>
	//script to hide and show textbox in select box
	$(document).ready(function() {
		$('#types').change(function(){
		if($('#types').val() == 'Other')
		   {
		   $('#other').css('display', 'block'); 
		      }
		else
		   {
		   $('#other').css('display', 'none');
		   }
		});
	});
</script>

<!-- Delete Script start -->
<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_daily_labour.php',
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

$('form#frm_labour').submit(function(e){

    e.preventDefault();

	if(document.pressed == 'save')
	{
			$("button#btn_contractor").button('loading');
		    $.ajax({
						data:$("#frm_labour").serialize(),
						type:"POST",
						url:'insert_daily_labour.php',

						success: function(data)
						{
							$("button#btn_contractor").button('reset');
							if(data==1) 
							{
							   swal({
									  position: 'top-right',
								      type: 'success',
									  title: 'New Daily Labour Added',
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
								// alert('Error..');
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
							
						}
				});
 	}
 else
 	if(document.pressed == 'update')
	{
          	e.preventDefault();
				
  		$("button#update").button('loading');
        $.ajax({
					data:$("#frm_labour").serialize(),
					type:"POST",
					url:'update_daily_labour.php',
					success: function(data)
					{
						$("button#update").button('reset');

						if(data==1)
						{
							swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'Daily Labour Info Has Been Updated',
  								  showConfirmButton: false,
  								  timer: 1500
							  })
							  window.setTimeout(function()
							    { 
							      window.location.href= "user_dashboard.php?page=daily_labour";
							 	} ,1500);
			
						}
						else if(data==3)
						{
							// alert('Updated Successfully !!!');
							
							swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'Flat Booking Info Has Been Updated',
  								  showConfirmButton: false,
  								  timer: 1500
							  })
							  window.setTimeout(function()
							    { 
							      window.location.href= "dashboard.php?page=daily_labour";
							 	} ,1500);
						}
						
					}

			   });
			
	}
});
</script>