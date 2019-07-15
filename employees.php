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

		$sql = mysql_query("SELECT * FROM mst_employee WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);

		$st_id= $data['state'];
		$ct_id= $data['city'];
	}
	else{
		    $data['s_type']='';
			$data['name']='';
			$data['gender']='';
			$data['email']='';
			$data['contact']='';
			$data['panno']='';
			$data['adharno']='';
		    $data['qualification']='';
			$data['dob']='';
			$data['state']='';
			$data['city']='';
			$data['address']='';
			$data['joining_date']='';
		}
?>
<div class="row">
<h3> Employee</h3><hr>

	<div class="col-lg-12">
		<h4>Employee Details</h4>
		<form id="form_emp" name="form_emp" autocomplete="off" method="POST">
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			

            <div class="col-md-4">
			<label>Salutation</label>
				<select class="form-control" name="solutation_type" id="solutation_type" >
				<?php if(empty($rec_id)){?>
					<option value="">Select Salutation</option>
					<option value="Mr">Mr</option>
					<option value="Miss">Miss</option>
				<?php } else{ ?>
					<option value="<?php echo $data['s_type']; ?>"><?php echo $data['s_type']; ?></option>
					<option value="Mr">Mr</option>
					<option value="Miss">Miss</option>
				<?php } ?>
				</select>
			</div>
			<div class="col-md-4">
			<label>Employee Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Employee Name" value="<?php if(isset($rec_id)){echo $data['name'];}else{} ?>" style="text-transform:capitalize;" required="">
			</div>
			<div class="col-md-4">
			<label>Gender <span class="required_field">*</span></label>
               <select class="form-control" name="sol_type" id="sol_type" required="">
               <?php if(empty($rec_id)){?>
					<option value="">Select Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				<?php } else{ ?>
					<option value="<?php echo $data['gender']; ?>"><?php echo $data['gender']; ?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				<?php } ?>	
				</select>
           	</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
				<label>Email Id <span class="required_field">*</span></label>
				<input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Email Id" value="<?php if(isset($rec_id)){echo $data['email'];}else{} ?>">
			</div>	
			
			<div class="col-md-4">
				<label>Contact No <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Contact No" value="<?php if(isset($rec_id)){echo $data['contact'];}else{} ?>" MaxLength="10" pattern="^[789]\d{9}$" required="">
			</div>

			<div class="col-md-4">
				<label>PAN No <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_panno" id="txt_panno" placeholder="PAN No" value="<?php if(isset($rec_id)){echo $data['panno'];}else{} ?>" MaxLength="10" pattern="[A-Z]{5}\d{4}[A-Z]{1}" required="">
			</div>
			<div class="panel-body"></div>


			<div class="col-md-4">
				<label>Aadhar Number</label>
				<input type="text" class="form-control" name="txt_adharno" id="txt_adharno" placeholder="Aadhar Number"  value="<?php if(isset($rec_id)){echo $data['adharno'];}else{} ?>" maxLength="14" minlength="0" >
				<p id="err"></p>
			</div>
			<script>
				$('#txt_adharno').keyup(function() {
					  var value = $(this).val();
					  var maxLength = $(this).attr("maxLength");
					  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
					  $(this).val(value);

					  if(value.length==0)
					  {
					  	$('#txt_adharno').css('borderColor','');
					    $('#err').html('');
					  }
					  else if (value.length != maxLength) {
					    $('#txt_adharno').css('borderColor','red');
					    $('#err').html('Enter Valid Aadhar Number');
					    $('#err').css('color','red');
					  } else {
					    $('#txt_adharno').css('borderColor','');
					    $('#err').html('');
					  }
				});
				// $('#txt_adharno').on("change", function() {
				// 	  var value = $(this).val();
				// 	  var maxLength = $(this).attr("maxLength");
				// 	  if (value.length != maxLength) {
				// 	    $('#txt_adharno').css('borderColor','red');
				// 	    $('#err').html('Enter Valid Aadhar Number');
				// 	    $('#err').css('color','red');
				// 	  } else {
				// 	    $('#txt_adharno').css('borderColor','');
				// 	    $('#err').html('');
				// 	  }
				// });
			</script>
			<div class="col-md-4">
				<label>Qualification</label>
				<input type="text" class="form-control" name="txt_qualification" id="txt_qualification" placeholder="Qualification" value="<?php if(isset($rec_id)){echo $data['qualification'];}else{} ?>">
			</div>
			
			<div class="col-md-4">
				<label>Date Of Birth <span class="required_field">*</span></label>
				<input type="date" name="dob" id="dob" class="form-control" data-placeholder="Date Of Birth" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['dob'];}else{} ?>"/>
			</div>
			<script>
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
				    $('#dob').attr('max', maxDate);
				});

			</script>
			<div class="panel-body"></div>
             <div class="col-md-4">
				<label>State <span class="required_field">*</span></label>
				<select class="form-control" name="txt_state" id="txt_state" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM tbl_states a INNER JOIN mst_employee b ON a.id=b.state WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
				<select class="form-control" name="txt_city" id="txt_city" required="">
				<?php if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM city a INNER JOIN mst_employee b ON a.ct_id=b.city WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
				<input type="text" class="form-control" name="txt_address" id="txt_address" placeholder="Address" value="<?php if(isset($rec_id)){echo $data['address'];}else{} ?>" required>
			</div>

			<div class="panel-body"></div>
			
			<div class="col-md-4">
				<label>Date Of Joining <span class="required_field">*</span></label>
				<input type="date" name="joining_date" id="joining_date" class="form-control" data-placeholder="Date Of Joining" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['joining_date'];}else{} ?>"/>
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
			<?php 
				if(empty($rec_id)){
		 	?>
			<button name="btn_customer" id="btn_customer" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
			<button name="btn_contractor_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
			<div id="msg"></div>
			</div>
			
		</form>
	</div>

<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Employee List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			   <th>Sr.No</th>
			   <th>Employee Name</th>
			   <th>Gender</th>
			   <th>Email ID</th>
			   <th>Contact NO.</th>
			   <th>PAN no.</th>
			   <th>Aadhar No</th>
			   <th>Qualification</th>
			   <th>DOB</th>
			   <th>State</th>
			   <th>City</th>
			   <th>Address</th>
			   <th>Joining Date</th>
			   <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		 	$sr_no=0;
		  	$sql = mysql_query("SELECT b.name as st_name,c.ct_name, a.* FROM `mst_employee` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['s_type'].' '.$row['name']; ?></td>
			  <td><?php echo $row['gender']; ?></td>
			  <td><?php echo $row['email']; ?></td>
			  <td><?php echo $row['contact']; ?></td>
			  <td><?php echo $row['panno']; ?></td>
			  <td><?php echo $row['adharno']; ?></td>
			  <td><?php echo $row['qualification']; ?></td>
			  <td><?php echo $row['dob']; ?></td>
			  <td><?php echo $row['st_name']; ?></td>
			  <td><?php echo $row['ct_name']; ?></td>
			  <td><?php echo $row['address']; ?></td>
			  <td><?php echo $row['joining_date']; ?></td>		
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=employee&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
				<a href='user_dashboard.php?page=employee&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?>
			  	<!-- | <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a></button> -->
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
			    <h4 class="modal-title" align="center">Delete Employee</h4>
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

<!-- Delete Script start -->
<script>
$("#delete_btn").click(function(e)
{ 
    var id=$('#del_id').val();
	e.preventDefault();

	   $.ajax({
	            url:'delete_employee.php',
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

$('form#form_emp').submit(function(e){

    e.preventDefault();
	
  	var txt_contact = $('#txt_contact').val();
  	var x = $('#txt_email').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
	if(document.pressed == 'save')
	{
	  	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        $('#txt_email').css('borderColor','red');
			$('#msg').html('Not A valid Email Address.');
			$('#msg').css('color','red');
	        return false;
	    }else{ 
	  
          	  if(txt_contact.length>=10 && txt_contact.length<=15)
              	{
              		$("button#btn_customer").button('loading');
			        $.ajax({
								data:$("#form_emp").serialize(),
								type:"POST",
								url:'insert_employee.php',
								success: function(data)
								{
									$("button#btn_customer").button('reset');
									if(data==1) 
									{
									   swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'New Employee Added',
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
										$('#msg').html('Please Check All Fields.');
										$('#msg').css('color','red');
										return false;
									} 
									else if(data==4)
		 							{
										$('#msg').html('Alredy Exist');
										$('#msg').css('color','red');
										return false;
									} 
								}
							});
			       	}
			       
	       			else{
		       				$('#txt_contact').css('borderColor','red');
			  				$('#msg').html('Mobile Number between 10 to 15 Number.');
							$('#msg').css('color','red');
	       				}

	       		}//end email validation
}	   
else
if(document.pressed == 'update')
	{
	  	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        $('#txt_email').css('borderColor','red');
			$('#msg').html('Not A valid Email Address.');
			$('#msg').css('color','red');
	        return false;
	    }else{
          	  if(txt_contact.length>=10 && txt_contact.length<=15)
              	{
              		$("button#update").button('loading');
			        $.ajax({
								data:$("#form_emp").serialize(),
								type:"POST",
								url:'update_employee.php',
								success: function(data)
								{
									$("button#update").button('reset');

									if(data==1)
									{										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Employee info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=employee";
										 	} ,1500);
						
									}
									else if(data==3)
									{										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Employee info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=employee";
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

	       			else{
		       				$('#txt_contact').css('borderColor','red');
			  				$('#msg').html('Mobile Number between 10 to 15 Number.');
							$('#msg').css('color','red');
	       				}
	       		}//end email validation
	    }
});

</script>

