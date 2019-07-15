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
		$sql = mysql_query("SELECT * FROM mst_contractor WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
	<h3> Contractor</h3><hr>
	<div class="col-lg-12">
	   <h4>Contractor Details</h4>
	   <form id="frm_contractor" name="frm_contractor" autocomplete="off" method="POST">
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			
            <div class="col-md-4">
				<label>Salutation</label>
				<select class="form-control" name="solutation_type" id="solutation_type">
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
				<label>Contractor Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Contractor Name" value="<?php if(isset($rec_id)){echo $data['name'];}else{} ?>" style="text-transform:capitalize;" required="">
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
				<label>Email Id</label>
				<input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Email Id" value="<?php if(isset($rec_id)){echo $data['email'];}else{} ?>">
			</div>	
			
			<div class="col-md-4">
				<label>Contact No <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Contact No" value="<?php if(isset($rec_id)){echo $data['contact'];}else{} ?>" MaxLength="10" pattern="^[789]\d{9}$" required="">
			</div>
			
			<div class="col-md-4">
				<label>Land Line No </label>
				<input type="text" class="form-control" name="land_line" id="land_line" placeholder="Land Line No" value="<?php if(isset($rec_id)){echo $data['land_line'];}else{} ?>">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>PAN No <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_panno" id="txt_panno" placeholder="PAN No" value="<?php if(isset($rec_id)){echo $data['panno'];}else{} ?>" MaxLength="10" pattern="[A-Z]{5}\d{4}[A-Z]{1}" required="">
			</div>
			
			<div class="col-md-4">
				<label>Aadhar Number</label>
				<input type="text" class="form-control" name="txt_adharno" id="txt_adharno" placeholder="Aadhar Number"  value="<?php if(isset($rec_id)){echo $data['adharno'];}else{} ?>" maxLength="14" minlength="12">
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
				
			</script>
			<div class="col-md-4">
				<label>Company Name</label>
				<input type="text" class="form-control" name="txt_comp_name" id="txt_comp_name" placeholder="Company Name" value="<?php if(isset($rec_id)){echo $data['comp_name'];}else{} ?>">
			</div>
			<div class="panel-body"></div>

			<div class="col-md-4">
				<label>GST No</label>
				<input type="text" class="form-control" name="txt_gst" id="txt_gst" placeholder="GST No" value="<?php if(isset($rec_id)){echo $data['gst_no'];}else{} ?>">
			</div>
			<script>
			  $(document).on('change',"#txt_gst", function(){    
			    var inputvalues = $(this).val();
			    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
			    
			    if (gstinformat.test(inputvalues)) {
			     return true;
			    } else {
			        alert('Please Enter Valid GSTIN Number');
			        // $("#txt_gst").val('');
			        $("#txt_gst").focus();
			    }
			    
			});
			</script> 
			
			<div class="col-md-4">
				<label>ESI Code No</label>
				<input type="text" name="pic_no" id="pic_no" class="form-control" placeholder="ESI Code No" value="<?php if(isset($rec_id)){echo $data['pic_no'];}else{} ?>"/>
			</div>

            <div class="col-md-4">
				<label>State <span class="required_field">*</span></label>
				<select class="form-control" name="txt_state" id="txt_state" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM tbl_states a INNER JOIN mst_contractor b ON a.id=b.state WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
           	<div class="panel-body"></div>

           	<div class="col-md-4">
				<label>City <span class="required_field">*</span></label>
				<select class="form-control" name="txt_city" id="txt_city" required="">
				<?php if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM city a INNER JOIN mst_contractor b ON a.ct_id=b.city WHERE b.id='$rec_id'")or die(mysql_error($connection));
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
				<input type="text" class="form-control" name="txt_address" id="txt_address" placeholder="Address" value="<?php if(isset($rec_id)){echo $data['address'];}else{} ?>" required="">
			</div>
			
		
			<div class="col-md-4">
				<label>Contractor Type <span class="required_field">*</span></label>
				<select class="form-control" name="txt_type" id="txt_type" required="">
				<?php if(empty($rec_id)){ ?>
					<option value="">Select Contractor Type</option>
					<option value="Main Contractor">Main Contractor</option>
					<option value="Sub Contractor">Sub Contractor</option>
				<?php }else{ ?>
					<option value="<?php echo $data['type']; ?>"><?php echo $data['type']; ?></option>
					<option value="Main Contractor">Main Contractor</option>
					<option value="Sub Contractor">Sub Contractor</option>
				<?php } ?>
				</select>
			</div>
			<div class="panel-body"></div>
			<div class="panel-body"></div>
			<div class="col-md-4">
			<?php 
				if(empty($rec_id)){
		 	?>
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
	    <h4>Contractor List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			   <th>Id</th>
			   <th>Contractor Name</th>
			   <th>Email Id</th>
			   <th>Contact No</th>
			   <th>Land Line</th>
			   <th>PAN No</th>
			   <th>Aadhar No</th>
			   <th>GST No</th>
			   <th>ESI Code No</th>
			   <th>Company Name</th>
			   <th>State</th>
			   <th>City</th>
			   <th>Address</th>
			   <th>Type</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			  	$sr_no=0;
			  	$sql = mysql_query("SELECT b.name as st_name,c.ct_name, a.* FROM `mst_contractor` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id")or die(mysql_error($connection));
			  		while($row=mysql_fetch_array($sql))
			  		{
			  			$sr_no++;
			  			$id=$row['id'];
			?>
			<tr id="invoice-23">
			  	<td><?php echo $sr_no; ?></td>
			    <td><?php echo $row['s_type'].' '.$row['name']; ?></td>
			    <td><?php echo $row['email']; ?></td>
			    <td><?php echo $row['contact']; ?></td>
			    <td><?php echo $row['land_line']; ?></td>
			    <td><?php echo $row['panno']; ?></td>
			    <td><?php echo $row['adharno']; ?></td>
			    <td><?php echo $row['gst_no']; ?></td>
			    <td><?php echo $row['pic_no']; ?></td>
			    <td><?php echo $row['comp_name']; ?></td>
			    <td><?php echo $row['st_name']; ?></td>
			    <td><?php echo $row['ct_name']; ?></td>
			    <td><?php echo $row['address']; ?></td>
			   	<td><?php echo $row['type']; ?></td>
			  	<td>
			  	<?php if($utype=='admin'){ ?>
			  		<a href='dashboard.php?page=contractor&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  	<?php }else{ ?>
			  		<a href='user_dashboard.php?page=contractor&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  	<?php } ?>
			  		<!-- | <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a> -->
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
			    <h4 class="modal-title" align="center">Delete Contractor</h4>
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
                            url:'delete_contractor.php',
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

$('form#frm_contractor').submit(function(e){

    e.preventDefault();
	
  	var txt_contact = $('#txt_contact').val();
  	// var x = $('#txt_email').val();
   //  var atpos = x.indexOf("@");
   //  var dotpos = x.lastIndexOf(".");


	if(document.pressed == 'save')
	{
	  	
	  // 	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || x=null) {
	  //       $('#txt_email').css('borderColor','red');
			// $('#msg').html('Not A valid Email Address.');
			// $('#msg').css('color','red');
	  //       return false;
	  //   }else{  
          if(txt_contact.length>=10 && txt_contact.length<=15)
              	{
              		 $("button#btn_contractor").button('loading');
			        $.ajax({
								data:$("#frm_contractor").serialize(),
								type:"POST",
								url:'insert_contactor.php',

								success: function(data)
								{
									$("button#btn_contractor").button('reset');
									  //alert(data);
									if(data==1) 
									{
									    //alert('Voucher Inserted !!!');
									   swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'New Contactor Added',
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
									else if(data==4)
									{
										$('#msg').html('Email or Mobile No Alredy Exist');
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
	       		// }//end of email validation
	     }
	     else
	     	if(document.pressed == 'update')
	  	{
	  	// 	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		  //       $('#txt_email').css('borderColor','red');
				// $('#msg').html('Not A valid Email Address.');
				// $('#msg').css('color','red');
		  //       return false;
	   //  	}else{ 
          	  if(txt_contact.length>=10 && txt_contact.length<=15)
              	{
              		$("button#update").button('loading');
			        $.ajax({
								data:$("#frm_contractor").serialize(),
								type:"POST",
								url:'update_contactor.php',
								success: function(data)
								{
									$("button#update").button('reset');
									if(data==1)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Contactor info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=contractor";
										 	} ,1500);
						
									}
									else if(data==3)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Contactor info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=contractor";
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
	       			// }//end of email validation
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