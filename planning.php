<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
	if(isset($_GET['id'])){
		$rec_id =$_GET['id'];
		$query=mysql_query("SELECT * FROM tbl_planning WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($query);
	}else{
		$data['id']='';
		$data['pro_id']='';
		$data['task_id']='';
		$data['start_date']='';
		$data['end_date']='';
		$data['total_work_plan']='';
		$data['unit']='';
		$data['pro_st_date']='';
		$data['pro_ed_date']='';
		$data['remark']='';
	}
	
?>
<div class="row">
	<h3> Planning</h3><hr>

	<div class="col-lg-12">
		<h4>Planning Details</h4>
		<form id="myform" name="myform" autocomplete="off" method="POST" >
			
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>"> 
			<div class="col-md-4">
				<label>Project Name <span class="required_field">*</span></label>
				<select name="sel_project" id="sel_project" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM tbl_planning a INNER JOIN new_project b ON a.pro_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$arr=mysql_fetch_array($sq);
					
				 ?>
				 <option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
				 <?php 
				if($utype=='admin'){
					$sq = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$sq = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
						while($arr=mysql_fetch_array($sq))
						{
				  ?>
				  <option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
				 <?php } }else{?>
				<option value="">Select Project</option>
				<?php 
				if($utype=='admin'){
					$sq = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$sq = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
				<?php } }?>
				</select>
			</div>

			<div class="col-md-4">
				<label>Project Start Date <span class="required_field">*</span></label>
				<input type="date" name="pro_start_Date" id="pro_start_Date" class="form-control" placeholder="Project Start Date (yyyy-mm-dd)" required aria-required="true" value="<?php echo $data['pro_st_date']; ?>" readonly/>
			</div>
			

			<div class="col-md-4">
				<label>Project End Date <span class="required_field">*</span></label>
				<input type="date" name="pro_end_Date" id="pro_end_Date" class="form-control" placeholder="Project End Date (yyyy-mm-dd)" required aria-required="true" value="<?php echo $data['pro_ed_date']; ?>" readonly/>
			</div> 
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>Task Name <span class="required_field">*</span></label>
				<select id="types" name="types" class="form-control" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_task a INNER JOIN tbl_planning b ON a.id=b.task_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
			<div class="col-md-4">
				<label>Planning Start Date <span class="required_field">*</span></label>
				<input type="text" name="start_Date" id="start_Date" class="form-control" placeholder="Planning Start Date" required aria-required="true" value="<?php echo $data['start_date']; ?>" />
			</div>
			
			<div class="col-md-4">
				<label>Planning End Date <span class="required_field">*</span></label>
				<input type="text" name="end_Date" id="end_Date" class="form-control" placeholder="Planning End Date" required aria-required="true" value="<?php echo $data['end_date']; ?>" />
			</div> 
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>Total Work Days <span class="required_field">*</span></label>
				<input type="number" name="total_work_days" id="total_work_days" class="form-control" placeholder="Total Work Days" value="<?php echo $data['total_work_plan']; ?>" required step=".01">
			</div>

			<div class="col-md-4">
				<label>Total Work Planned <span class="required_field">*</span></label>
				<input type="number" name="total_work_planed" id="total_work_planed" class="form-control" placeholder="Total Work Planned" value="<?php echo $data['total_work_plan']; ?>" required step=".01">
			</div>

			<div class="col-md-4">
				<label>Unit <span class="required_field">*</span></label>
				<select id="unit" name="unit" class="form-control">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_unit a INNER JOIN tbl_planning b ON a.unit=b.unit WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['unit']; ?>"><?php echo $row1['unit']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM mst_unit ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Unit</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM mst_unit ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>
				<?php } } ?>
				</select>
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
				<label>Remark </label>
				<textarea class="form-control" name="remark" id="remark" ><?php echo $data['remark']; ?></textarea>
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
				<?php if(empty($rec_id)){ ?>
				<button name="btn_newproject" id="btn_newproject" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php } else{ ?>
				<button name="btn_contractor_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>
	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Planning List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Project Name</th>
			  <th>Project Start Date</th>
			  <th>Project End Date</th>
			  <th>Task Name</th>
			  <th>Planning Start Date</th>
			  <th>Planning End Date </th>
			  <th>Total Work Days</th>
			  <th>Total Work Planned</th>
			  <th>Unit</th>
			  <th>Remark</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$sql = mysql_query("SELECT c.description,b.pro_name, a.* FROM `tbl_planning` a INNER JOIN new_project b ON a.pro_id = b.id INNER JOIN mst_task c ON c.id=a.task_id")or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($sql)){
		  		$sr_no++;
		  		// $sdt= $row['start_date'];
		  		// $stdate = date('Y-m-d', strtotime($sdt));
		  		// $edt= $row['end_date'];
		  		// $eddate = date('Y-m-d', strtotime($edt));
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['pro_st_date']; ?></td>
			  <td><?php echo $row['pro_ed_date']; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['start_date']; ?></td>
			  <td><?php echo $row['end_date']; ?></td>
			  <td><?php echo $row['total_work_days']; ?></td>
			  <td><?php echo $row['total_work_plan']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['remark']; ?></td>

			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=planning&id=<?php echo $row['id']; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=planning&id=<?php echo $row['id']; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?> |
			  	<a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $row['id']; ?>');"><span class="icon fa fa-trash"></span></a></button>
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
			    <h4 class="modal-title" align="center">Delete Planning Details</h4>
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

<!-- script for hide dates less than todays date -->
<script>
	$(document).ready(function() {
    $('#start_Date').datepicker({
        onSelect: function(dateText, inst) {
            //Get today's date at midnight
            var today = new Date();
            today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //Get the selected date (also at midnight)
            var selDate = Date.parse(dateText);

            if(selDate < today) {
                //If the selected date was before today, continue to show the datepicker
                $('#start_Date').val('');
                $(inst).datepicker('show');
            }
        }
    });
});
$(document).ready(function() {
    $('#end_Date').datepicker({
        onSelect: function(dateText, inst) {
            //Get today's date at midnight
            var today = new Date();
            today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //Get the selected date (also at midnight)
            var selDate = Date.parse(dateText);

            if(selDate < today) {
                //If the selected date was before today, continue to show the datepicker
                $('#end_Date').val('');
                $(inst).datepicker('show');
            }
        }
    });
});
</script>

<!-- project data script -->
<script type="text/javascript">
$(document).ready(function(){
    $('#sel_project').on('change',function(){
        var pro_id = $(this).val();

        if(pro_id){

            $.ajax({
                type:'POST',
                url:'get_project_details.php',
                data:'pro_id='+pro_id,
                // dataType: "JSON",
                success:function(data){
                	console.log(data);
                	var obj = $.parseJSON(data);
                	$('#pro_start_Date').val(obj.start_date);
                    $('#pro_end_Date').val(obj.end_date);
                }

            }); 
        }else{
           $('#sel_project').html('Plese Select Project First'); 
        }
    });
});
</script>
<script>


 // Delete Script start 
$("#delete_btn").click(function(e)
{ 
    var id=$('#del_id').val();
  	e.preventDefault();

   	$.ajax({
	            url:'delete_planning.php',
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

// script for insert and update
$('form#myform').submit(function(e){

     e.preventDefault();

	if(document.pressed == 'save')
	  {
	  	  $("button#btn_newproject").button('loading');
	           $.ajax({
						data:$("#myform").serialize(),
						type:"POST",
						url:'insert_planning.php',

						success: function(data)
						{
							$("button#btn_newproject").button('reset');
							 
							if(data==1) 
							{
							   swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'New Record Added',
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
	  		$("button#update").button('loading');
	         $.ajax({
						data:$("#myform").serialize(),
						type:"POST",
						url:'update_planning.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
							{
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Info Has Been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=planning";
								 	} ,1500);
				
							}
							else if(data==3)
							{
								// alert('Updated Successfully !!!');
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Info Has Been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=planning";
								 	} ,1500);
							}
							else if(data==2)
							{
								// alert('Error....');
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
							// else if(data==4)
							// {
							// 	$('#end_dt').css('borderColor','red');
							// 	$('#msg').html('End Date Must Be Greter Than Start Date.');
							// 	$('#msg').css('color','red');
								
							// 	return false;
							// } 
						}
				   });

	    }
	  return true;

});

</script>
