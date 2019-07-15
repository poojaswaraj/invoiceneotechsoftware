<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];

	if($rec_id = isset($_GET['id']) ? $_GET['id'] : '')
	{
		$row=mysql_query("SELECT * FROM new_project WHERE id=$rec_id");
		$data=mysql_fetch_array($row);
	}
	else{
		$data['pro_name']='';
		$data['maharera_no']='';
		$data['owner_name']='';
		$data['state']='';
		$data['city']='';
		$data['address']='';
		$data['total_sale_area']='';
		$data['neo_allow_area']='';
		$data['neo_allow_rate']='';
		$data['start_date']='';
		$data['end_date']='';
	}
	
?>
<div class="row">
	<h3>New Project</h3><hr>
	
	<div class="col-lg-12">
	
		<h4>Add Project</h4>
		<form id="new_project" name="new_project" method="post" autocomplete="off">
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">


			<div class="col-md-4">
				<label>Project Name <span class="required_field">*</span></label>	
				<input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Project Name" required="" value="<?php echo $data['pro_name'];?>">
			</div>
			<div class="col-md-4">
				<label>Maha Rera No</label>	
				<input type="text" class="form-control" name="maharera_no" id="maharera_no" placeholder="Maha Rera No" value="<?php echo $data['maharera_no'];?>">
			</div>
			<div class="col-md-4">
				<label>Project Owner <span class="required_field">*</span></label>	
				<input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Project Owner" required="" value="<?php echo $data['owner_name'];?>">
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
				<label>State <span class="required_field">*</span></label>	
				<select class="form-control" name="sel_state" id="txt_state" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT * FROM tbl_states a INNER JOIN new_project b ON a.id=b.state WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM tbl_states")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

				<?php } }else{ ?>
				<option value="">Select State</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM tbl_states")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
				<?php } } ?>
				</select>
			</div>
			<div class="col-md-4">
				<label>City <span class="required_field">*</span></label>	
				
				<select class="form-control" name="sel_city" id="txt_city" required="">
				<?php if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM city a INNER JOIN new_project b ON a.ct_id=b.city WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);
				?>
					<option value="<?php echo $row1['ct_id']; ?>"><?php echo $row1['ct_name']; ?></option>
				<?php 
					$sql12=mysql_query("SELECT * FROM city WHERE st_id='$st_id'")or die(mysql_error($connection));
					while($row12=mysql_fetch_array($sql12)){
				 ?>
					<option value="<?php echo $row12['ct_id']; ?>"><?php echo $row12['ct_name']; ?></option>
				 <?php } }else{ ?>
                    <option value="">Select City</option>
                 <?php } ?>
                </select>
			</div>
			<div class="col-md-4">
				<label>Address <span class="required_field">*</span></label>	
				<input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $data['address']; ?>" required="">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>Total Saleble Area</label>	
				<input type="number" class="form-control" name="total_sale_area" id="total_sale_area" placeholder="Total Saleble Area" value="<?php echo $data['total_sale_area']; ?>" step=".01">
			</div>
			<div class="col-md-4">
				<label>Neo Tech Allowted Area</label>	
				<input type="number" class="form-control" name="neo_allow_area" id="neo_allow_area" placeholder="Neo Tech Allowted Area" value="<?php echo $data['neo_allow_area']; ?>" step=".01">
			</div>
			<div class="col-md-4">
				<label>Neo Tech Allowted Rate</label>	
				<input type="number" class="form-control" name="neo_allow_rate" id="neo_allow_rate" placeholder="Neo Tech Allowted Rate" value="<?php echo $data['neo_allow_rate']; ?>" step=".01">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>Start Date <span class="required_field">*</span></label>	
				<input type="date" class="form-control" name="start_dt" id="start_dt" data-placeholder="Start Date" required value="<?php echo $data['start_date']; ?>">
			</div>
			<div class="col-md-4">
				<label>End Date <span class="required_field">*</span></label>	
				<input type="date" class="form-control" name="end_dt" id="end_dt" data-placeholder="End Date" required value="<?php echo $data['end_date']; ?>" >
			</div>
			
			<div class="panel-body"></div>

	 		<div class="col-md-4">
	 		<?php if (empty($rec_id)) {?>
				<button name="btn_newproject" id="btn_newproject" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
				<button name="btn_project_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>

	<div class="panel-body"></div>
	<div class="col-lg-12" id="reportdata">
        <h4>Project List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Project Name</th>
			  <th>Start Date</th>
			  <th>End Date</th>
			  <th>Owner Name</th>
			  <th>Maha Rera No</th>
			  <th>State</th>
			  <th>City</th>
			  <th>Address</th>
			  <th>Total Saleble Area</th>
			  <th>Neo Allowted Area</th>
			  <th>Neo Allowted Rate</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$query = mysql_query("SELECT b.name as st_name,c.ct_name, a.* FROM `new_project` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id" )or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($query))
		  	{
		  		$sr_no++;
		  		$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['start_date']; ?></td>
			  <td><?php echo $row['end_date']; ?></td>
			  <td><?php echo $row['owner_name']; ?></td>
			  <td><?php echo $row['maharera_no']; ?></td>
			  <td><?php echo $row['st_name']; ?></td>
			  <td><?php echo $row['ct_name']; ?></td>
			  <td><?php echo $row['address']; ?></td>
			  <td><?php echo $row['total_sale_area']; ?></td>
			  <td><?php echo $row['neo_allow_area']; ?></td>
			  <td><?php echo $row['neo_allow_rate']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=new_project&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?> 
			  	<a href='user_dashboard.php?page=new_project&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?>
			  	<!--| <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a> -->
			  </td>
			</tr>
		<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<!-- state city script -->
<script type="text/javascript">
$(document).ready(function(){
    $('#txt_state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'get_state_city.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#txt_city').html(html);
                }
            }); 
        }else{
           $('#txt_city').html('<option value="">Select sttxt_stateate first</option>'); 
        }
    });
});
</script>
<!--Delete model start here-->

<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Project</h4>
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
                url:'delete_new_project.php',
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

$('form#new_project').submit(function(e){

    e.preventDefault();

	if(document.pressed == 'save')
	  {
	  	  $("button#btn_newproject").button('loading');
	           $.ajax({
						data:$("#new_project").serialize(),
						type:"POST",
						url:'insert_new_project.php',

						success: function(data)
						{
							$("button#btn_newproject").button('reset');
							 
							if(data==1) 
							{
							   swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'New Project Added',
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
							
						}
					 
					 });
	}

 	else
	  if(document.pressed == 'update')
	  	{
	  		$("button#update").button('loading');
	         $.ajax({
						data:$("#new_project").serialize(),
						type:"POST",
						url:'update_new_project.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
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
								      window.location.href= "user_dashboard.php?page=new_project";
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
								      window.location.href= "dashboard.php?page=new_project";
								 	} ,1500);
							}
							else if(data==2)
							{
								// alert('Error....');
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
						}
				   });

	    }
	  return true;

});

</script>


<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script>
    <script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#fromDate').datepicker();
        $('#toDate').datepicker();
    })
}
</script>