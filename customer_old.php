<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];

	if($rec_id = isset($_GET['id']) ? $_GET['id'] : '')
		{
			$row=mysql_query("SELECT * FROM mst_customer WHERE id=$rec_id");
			$data=mysql_fetch_array($row);
		}
		else{
			$data['cust_name']="";
			$data['cust_email']="";
			$data['cust_contact']="";
			$data['cust_address']="";
		}
?>

<div class="row">
	<h3> Customer</h3><hr>
	<div class="col-lg-12">
		<h4>Customer Details</h4>
		<form id="frm_cust" name="frm_cust" autocomplete="off" method="POST" >
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

			<div class="col-md-4">
				<label>Customer Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Customer Name" value="<?php echo $data['cust_name'];?>">
			</div>
			<div class="col-md-4">
				<label>Email Id </label>
				<input type="email" class="form-control" name="txt_mail" id="txt_email" placeholder="Email Id" value="<?php echo $data['cust_email'];?>" >
			</div>
			
			<div class="col-md-4">
				<label>Contact No <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Contact No" MaxLength="10" pattern="^[789]\d{9}$" value="<?php echo $data['cust_contact'];?>">
			</div>
			<div class="panel-body"></div>
		
			<div class="col-md-4">
				<label>Address <span class="required_field">*</span></label>
			
				<textarea class="form-control" name="txt_address" id="txt_address" placeholder="Address"><?php echo $data['cust_address'];?></textarea>
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
        <h4>Customer List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Customer Name</th>
			  <th>Contact No</th>
			  <th>Email Id</th>
			  <th>Address</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
				$sr_no=0;
				$sql = mysql_query("SELECT * FROM mst_customer")or die(mysql_error($connection));
				while($row=mysql_fetch_array($sql))
				{	
					$sr_no++;
					$id=$row['id'];	
			 ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['cust_name']; ?></td>
			  <td><?php echo $row['cust_contact']; ?></td>
			  <td><?php echo $row['cust_email']; ?></td>
			  <td><?php echo $row['cust_address']; ?></td>
			  <td>
			  	<a href='dashboard.php?page=customer&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> |
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
			    <h4 class="modal-title" align="center">Delete Customer</h4>
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
                    url:'delete_neocustomer.php',
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
                        }                          
                    }
                });
    })
</script>
<!-- Insert Script -->
<script>

$('form#frm_cust').submit(function(e){

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
              		 $("button#btn_contractor").button('loading');
			        $.ajax({
								data:$("#frm_cust").serialize(),
								type:"POST",
								url:'insert_neocustomer.php',

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
			  								  title: 'New Customer Added',
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
								data:$("#frm_cust").serialize(),
								type:"POST",
								url:'update_neocustomer.php',
								success: function(data)
								{
									$("button#update").button('reset');
									  // alert(data);

									if(data==1)
									{
										 //alert('Updated Successfully !!!');
										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Customer Info Has Been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=customer";
										 	} ,1500);
						
									}
									else if(data==3)
									{
										// alert('Updated Successfully !!!');
										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Customer Info Has Been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=customer";
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
			        else{
		       				$('#txt_contact').css('borderColor','red');
			  				$('#msg').html('Mobile Number between 10 to 15 Number.');
							$('#msg').css('color','red');
	       				}
	       			}//end of email validation
	       		}
	return true;
});

</script>
