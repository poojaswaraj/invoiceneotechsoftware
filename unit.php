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

		$sql = mysql_query("SELECT * FROM mst_unit WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
	<h3> Units</h3><hr>
	<div class="col-lg-12">
		<h4>Unit Details </h4>
		<form id="frm_unit" name="frm_unit" autocomplete="off" method="POST" >
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			<div class="col-md-4">
				<label>Unit <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_unit" id="txt_unit" placeholder="Unit" value="<?php if(isset($rec_id)){echo $data['unit'];}else{} ?>" required=""> 	
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
			<?php 
				if(empty($rec_id)){
		 	?>
				<button name="btn_unit" id="btn_unit" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
				<button name="btn_unit_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
			<div id="msg"></div>
				
			</div>
		</form>
	</div>

	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Unit List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Unit Name</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sr_no=0;
		  		$sql = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  	?>
			<tr id="invoice-23">
			  	<td><?php echo $sr_no; ?></td>
				<td><?php echo $row['unit']; ?></td>
				<td>
				<?php if($utype=='admin'){ ?>
			  		<a href='dashboard.php?page=unit&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  	<?php }else{ ?>
			  		<a href='user_dashboard.php?page=unit&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
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
			    <h4 class="modal-title" align="center">Delete Unit</h4>
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
                    url:'delete_unit.php',
                    type: "POST",
                    data: {
                           id:id  
                    },
                    success: function(data)
                        {
                          // alert(data);
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
                            }                          
                        }
                });
        })
</script>

<!-- Insert Script -->
<script>

$('form#frm_unit').submit(function(e){

    e.preventDefault();
	
  	if(document.pressed == 'save')
	{
	  	$("button#btn_unit").button('loading');
        $.ajax({
					data:$("#frm_unit").serialize(),
					type:"POST",
					url:'insert_unit.php',
					success: function(data)
					{
						$("button#btn_unit").button('reset');
						  // alert(data);
						if(data==1) 
						{
						   swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'New Unit Added',
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
							 alert('Error..');
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
						data:$("#frm_unit").serialize(),
						type:"POST",
						url:'update_unit.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
							{
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Unit info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=unit";
								 	} ,1500);
				
							}
							else if(data==3)
							{
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Unit info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=unit";
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
