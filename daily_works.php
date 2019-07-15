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

		$sql = mysql_query("SELECT * FROM daily_works WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
		    $data['cont_id']='';
			$data['date']='';
			$data['work_type']='';
			$data['volume_of_work']='';
			$data['no_skill_labour']='';
			$data['no_unskill_labour']='';
			$data['unit_id']='';
			$data['value']='';
			
		   
		}
?>
<div class="row">
	<h3> Daily Labour/Work</h3><hr>

	<div class="col-lg-12">
		<h4>Daily Labour/Work</h4>
		<form id="myform" name="myform" autocomplete="off" method="POST" >
			
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

			<div class="col-md-4">
				<label>Date <span class="required_field">*</span></label>
				<input type="date" name="txtDate" id="txtDate" class="form-control" data-placeholder="Date" required aria-required="true" value="<?php echo $data['date']; ?>" />
			</div>
			
			<div class="col-md-4">
				<label>Project <span class="required_field">*</span></label>	
				<select class="form-control" name="pro_name" id="pro_name" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT b.* FROM daily_works a INNER JOIN new_project b ON a.pro_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);
				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['pro_name']; ?></option>
				<?php 
				if($utype=='admin'){
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$query = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
					while($row=mysql_fetch_array($query))
					  {

				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } }else{ ?>

					<option value="">Select Project</option>
				<?php 
				if($utype=='admin'){
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$query = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
					while($row=mysql_fetch_array($query))
					 {
				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } } ?>
					
				</select>
			</div>

			<div class="col-md-4">
				<label>Contractor <span class="required_field">*</span></label>
				<select class="form-control" name="contractor" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_contractor a INNER JOIN daily_works b ON a.id=b.cont_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
		
			<div class="panel-body"></div>
			
			<div class="col-md-4">
				<label>Work Type <span class="required_field">*</span></label>
				<select id="types" name="types" class="form-control" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_task a INNER JOIN daily_works b ON a.id=b.work_type WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
				<label>No of Skilled Labours <span class="required_field">*</span></label>
				<input type="number" class="form-control" name="num_labour" id="num_labour" placeholder="No of Skilled Labours" value="<?php echo $data['no_skill_labour']; ?>" step=".01" required="">
			</div>
			
			<div class="col-md-4">
				<label>No of Unskilled Labours <span class="required_field">*</span></label>
				<input type="number" class="form-control" name="num_unskill_labour" id="num_unskill_labour" placeholder="No of Unskilled Labours" value="<?php echo $data['no_unskill_labour']; ?>" step=".01" required="">
			</div>

			<div class="panel-body"></div>
			<div class="col-md-4">
				<label>Total Work Planned</label>
				<input type="text" name="total_plan" id="total_plan" class="form-control" placeholder="Total Work Planned" readonly="" onkeyup="taxoncalculation();">
			</div>

			<div class="col-md-4">
				<label>Actual Work Done / Volume</label>
				<input type="number" name="work_volume" id="work_volume" class="form-control" placeholder="Actual Work Done / Volume" value="<?php echo $data['volume_of_work']; ?>" onkeyup="taxoncalculation();">
			</div>

			<div class="col-md-4">
				<label>Remaining Work Planed</label>
				<input type="text" name="remain_work" id="remain_work" class="form-control" placeholder="Remaining Work Planed" readonly="">
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
				<label>Unit <span class="required_field">*</span></label>
				<select id="unit" name="unit" class="form-control">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_unit a INNER JOIN daily_works b ON a.id=b.unit_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['unit']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM mst_unit ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['unit']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Unit</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM mst_unit ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['unit']; ?></option>
				<?php } } ?>
				</select>
			</div>

			<div class="col-md-4">
				<label>Value</label>
				<input type="number" name="value" class="form-control" placeholder="Value" value="<?php echo $data['value']; ?>" step=".01">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
			<?php if(empty($rec_id)){?>
				<button name="btn_newproject" id="btn_newproject" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
				<button name="btn_contractor_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
				<div id="msg"></div>
			</div>
		</form>
	</div>
	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Daily Labour/Work List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Date</th>
			  <th>Project</th>
			  <th>Contractor Name</th>
			  <th>Work Type</th>
			  <th>No of Skilled Labours</th>
			  <th>No of Unskilled Labours</th>
			  <th>Work Done/Volume</th>
			  <th>Unit</th>
			  <th>Value</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  $sr_no=0;
		  if($utype=='admin'){
			$sql = mysql_query("SELECT e.pro_name,b.name,c.description,d.unit,a.* FROM `daily_works` a INNER JOIN mst_contractor b ON a.cont_id=b.id INNER JOIN mst_task c ON a.work_type=c.id INNER JOIN mst_unit d ON a.unit_id=d.id INNER JOIN new_project e ON a.pro_id=e.id")or die(mysql_error($connection));
		  }else{
		  	$sql = mysql_query("SELECT e.pro_name,b.name,c.description,d.unit,a.* FROM `daily_works` a INNER JOIN mst_contractor b ON a.cont_id=b.id INNER JOIN mst_task c ON a.work_type=c.id INNER JOIN mst_unit d ON a.unit_id=d.id INNER JOIN new_project e ON a.pro_id=e.id INNER JOIN `project_team` f ON e.id=f.pro_id WHERE f.emp_id='$user_id' ")or die(mysql_error($connection));
		  }
		  	
		  	while($row=mysql_fetch_array($sql)){
		  		$sr_no++;
		  		$id=$row['id'];
		  ?>

			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['no_skill_labour']; ?></td>
			  <td><?php echo $row['no_unskill_labour']; ?></td>
			  <td><?php echo $row['volume_of_work']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['value']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=daily_works&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=daily_works&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?> |
			  	<a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a></button>
			  </td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<script>
onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var total_plan = document.getElementById('total_plan').value;
    var work_volume = document.getElementById('work_volume').value;
   // console.log(total_plan);
	var remain = parseFloat(total_plan)- parseFloat(work_volume); //reduce from avail qty

 	// if (Number(total_plan) >= Number(work_volume)) 
 	// {
 		if(total_plan=='Not Yet Planned')
 		{
 			document.getElementById('remain_work').value = 'Not Yet Planned';
 		}else{
 			if(!isNaN(remain)){
    		document.getElementById('remain_work').value = parseFloat(remain).toFixed(2);
		    }
		    else{
	    		document.getElementById('remain_work').value = parseFloat(total_plan).toFixed(2);
		    }
 		}
    	
	 //    $('#work_volume').css('borderColor','');
		// $('#msg').html('');
	// }
	// else{
	// 		document.getElementById('remain_work').value ='';
	// 		$('#work_volume').css('borderColor','red');
	// 		$('#msg').html('Check Total Work Planned First');
	// 		$('#msg').css('color','red');
	// 	}
}
</script>
<script>
	$(document).ready(function(){
	    $('#types').on('change',function(){
	        var id = $(this).val();

	      if(id!=null)
	        {
	          $.ajax({
	                    type:'POST',
	                    url: "get_plan_details.php",
	                    data:{
	                            id:id
	                    },
	                    dataType: "JSON",
	                    success:function(data)
	                    {
	                   		$('#total_plan').val(data.total_work_plan);

	                   		if(data==3){
	                   			$('#total_plan').val('Not Yet Planned');
	                   		}
	                    },
	                    
	                }); 
	          }else{
	              $('#types').html('Select Material first'); 
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
	            url:'delete_daily_work.php',
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
// script to dissable future dates
	$(function(){
	    var dtToday = new Date();
	    
	    var month = dtToday.getMonth() + 1;
	    var day = dtToday.getDate();
	    var year = dtToday.getFullYear();
	    if(month < 10)
	        month = '0' + month.toString();
	    if(day < 10)
	        day = '0' + day.toString();
	    
	    var maxDate = year + '-' + month + '-' + day;
	    // alert(maxDate);
	    $('#txtDate').attr('max', maxDate);
	});
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
						url:'insert_daily_labwork.php',

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
						url:'update_daily_labwork.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
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
								      window.location.href= "user_dashboard.php?page=daily_works";
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
								      window.location.href= "dashboard.php?page=daily_works";
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
