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

		$sql = mysql_query("SELECT * FROM flat_booking WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
			$data['flat_details']='';
			$data['area']='';
			$data['rate']='';
			$data['other_charges']='';
			$data['gov_charges']='';
			$data['amount']='';
			$data['payment_date']='';
			$data['paid_amount']='';
			$data['total_due']='';
			$data['balance_amount']='';
			$data['cust_name']='';
			$data['cust_cont']='';
		}
?>

<div class="row">
	<h3>Booking Details</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Details Info</h4>
	<form id="flat_booking" name="flat_booking" method="post" autocomplete="off">

		<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
		<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
		<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
		<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

		<div class="col-md-3">
		<label>Payment Date <span class="required_field">*</span></label>
			<input type="date" name="paymet_date"  class="form-control" data-placeholder="Payment Date" required aria-required="true" value="<?php echo $data['payment_date']; ?>" />
		</div>
		<div class="col-md-3">
		<label>Customer Name <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="Customer Name"  required="" value="<?php echo $data['cust_name']; ?>" onkeyup="taxoncalculation();">
		</div>
		<div class="col-md-3">
		<label>Customer Contact No <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="cust_cont" id="cust_cont" placeholder="Customer Contact No" MaxLength="10" pattern="^[789]\d{9}$" required="" value="<?php echo $data['cust_cont']; ?>" onkeyup="taxoncalculation();">
		</div>
		
		<div class="col-md-3">
		<label>Project Name <span class="required_field">*</span></label>
			<select class="form-control" name="pro_name" id="pro_name" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM new_project a INNER JOIN flat_booking b ON a.id=b.pro_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);
				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['pro_name']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Project</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } } ?>
			</select>
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
		<label>Flat Details <span class="required_field">*</span></label>
			<textarea class="form-control" name="flat_details" value="flat_details"  placeholder="Flat Details" required=""><?php echo $data['flat_details']; ?></textarea>
		</div>
	
		<div class="col-md-3">
		<label>Area <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="area" id="area" placeholder="Area"  required="" value="<?php echo $data['area']; ?>" onkeyup="taxoncalculation();" step=".01">
		</div>

		<div class="col-md-3">
		<label>Rate <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="rate" id="rate" placeholder="Rate"  required="" value="<?php echo $data['rate']; ?>" onkeyup="taxoncalculation();" step=".01">
		</div>

		<div class="col-md-3">
		<label>Government Charges</label>
			<input type="number" class="form-control" name="gov_charge" id="gov_charge" placeholder="Government Charges"  value="<?php echo $data['gov_charges']; ?>" onkeyup="taxoncalculation();" step=".01">
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
		<label>Other Charges</label>
			<input type="number" class="form-control" name="other_charge" id="other_charge" placeholder="Other Charges" value="<?php echo $data['other_charges']; ?>" onkeyup="taxoncalculation();" step=".01">
		</div>
		
		<div class="col-md-3">
		<label>Total Amount</label>
			<input type="text" class="form-control" name="toatl_amt" id="toatl_amt" placeholder="Total Amount"  value="<?php echo $data['amount']; ?>" readonly >
		</div>

		<div class="col-md-3">
		<label>Paid Amount</label>
			<input type="number" class="form-control" name="paid_amt" id="paid_amt" placeholder="Paid Amount" value="<?php echo $data['paid_amount']; ?>" onkeyup="taxoncalculation();" step=".01">
		</div>
	
		<div class="col-md-3">
		<label>Balance Amount</label>
			<input type="text" class="form-control" name="bal_amt" id="bal_amt" placeholder="Balance Amount"  value="<?php echo $data['balance_amount']; ?>" readonly >
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
        <h4>Booking List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Payment Date</th>
			  <th>Customer Name</th>
			  <th>Contact No</th>
			  <th>Project Name</th>
			  <th>Flat Details</th>
			  <th>Area</th>
			  <th>Rate</th>
			  <th>Government Charges</th>
			  <th>Other Charges </th>
			  <th>Total Amount</th>
			  <th>Paid Amount</th>
			  <th>Balance Amount</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			 include("config.php");

			  $select=mysql_query("SELECT c.pro_name, a.* FROM `flat_booking` a INNER JOIN new_project c ON c.id=a.pro_id")or die(mysql_error($connection));
			  $sr_no=0;
			  while($userrow=mysql_fetch_array($select))
			   {
		   		  $sr_no++;
		   		  $id=$userrow['id'];
				  $payment_date=$userrow['payment_date'];
				  $cust_name=$userrow['cust_name'];
				  $pro_name=$userrow['pro_name'];
				  $flat_details=$userrow['flat_details'];
				  $area=$userrow['area'];
				  $rate=$userrow['rate'];
				  $gov_charges=$userrow['gov_charges'];
				  $other_charges=$userrow['other_charges'];
				  $amount=$userrow['amount'];
				  $paid_amount=$userrow['paid_amount'];
				  $balance_amount=$userrow['balance_amount'];
			?>
				<tr>
					<td><?php echo $sr_no; ?></td> 
					<td><?php echo $payment_date; ?></td>
					<td><?php echo $cust_name; ?></td>
					<td><?php echo $userrow['cust_cont']; ?></td>
					<td><?php echo $pro_name; ?></td>
					<td><?php echo $flat_details; ?></td>
					<td><?php echo $area; ?></td>
					<td><?php echo $rate; ?></td>
					<td><?php echo $gov_charges; ?></td>
					<td><?php echo $other_charges; ?></td>
					<td><?php echo $amount; ?></td>
					<td><?php echo $paid_amount; ?></td>
					<td><?php echo $balance_amount; ?></td>
				<td>
				<?php if($utype=='admin'){ ?>
				  	<a href='dashboard.php?page=flat_booking&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
				<?php }else{ ?>
					<a href='user_dashboard.php?page=flat_booking&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
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
			    <h4 class="modal-title" align="center">Delete Details</h4>
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
	onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var area = document.getElementById('area').value;
    var rate = document.getElementById('rate').value;
   	var gov_charge = document.getElementById('gov_charge').value;
   	var other_charge = document.getElementById('other_charge').value;
   	var paid_amt = document.getElementById('paid_amt').value;

	var totalcost =  parseFloat(area) * parseFloat(rate);//calculate base amt
	var add_gov = parseFloat(totalcost)+ parseFloat(gov_charge);//to calculate amt with gov amt
	var add_other = parseFloat(totalcost)+ parseFloat(other_charge);// to calculate amt with other charges
	var total_amt = parseFloat(add_gov)+ parseFloat(other_charge);// to calculate amt with gov and other charges
	var paid = parseFloat(totalcost)- parseFloat(paid_amt); //reduce from base amt
	var paid_gov = parseFloat(add_gov)- parseFloat(paid_amt); //reduce from base amt+ gov
	var paid_other = parseFloat(add_other)- parseFloat(paid_amt); //reduce from base amt+other
	var paid_total = parseFloat(total_amt)- parseFloat(paid_amt); //reduce from base amt+gov+other
		// to show balance amt and total amt 
    	if(!isNaN(total_amt)){
    		document.getElementById('toatl_amt').value = parseFloat(total_amt).toFixed(2);
    		document.getElementById('bal_amt').value = parseFloat(total_amt).toFixed(2);
	    }
	    else if(!isNaN(add_other)){
    		document.getElementById('toatl_amt').value = parseFloat(add_other).toFixed(2);
    		document.getElementById('bal_amt').value = parseFloat(add_other).toFixed(2);
	    }
	    else if(!isNaN(add_gov)){
    		document.getElementById('toatl_amt').value = parseFloat(add_gov).toFixed(2);
    		document.getElementById('bal_amt').value = parseFloat(add_gov).toFixed(2);
	    }
	    else{
	    	document.getElementById('toatl_amt').value = parseFloat(totalcost).toFixed(2);
	    	document.getElementById('bal_amt').value = parseFloat(totalcost).toFixed(2);
	    }
	    // to show balance amt after pay amt
	    if(!isNaN(paid_total)){
    		document.getElementById('bal_amt').value = parseFloat(paid_total).toFixed(2);
	    }
	    else if(!isNaN(paid_other)){
    		document.getElementById('bal_amt').value = parseFloat(paid_other).toFixed(2);
	    }
	    else if(!isNaN(paid_gov)){
    		document.getElementById('bal_amt').value = parseFloat(paid_gov).toFixed(2);
	    }
	    else if(!isNaN(paid)){
	    	document.getElementById('bal_amt').value = parseFloat(paid).toFixed(2);
	    }
		
}
</script>
<!-- Delete Script start -->
<script>
$("#delete_btn").click(function(e)
   { 
    	var id=$('#del_id').val();
	 	e.preventDefault();

	       $.ajax({
                    url:'delete_flat_booking.php',
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

$('form#flat_booking').submit(function(e){

    e.preventDefault();
	
  	var paid_amt = $('#paid_amt').val();
	var total_amt = $('#toatl_amt').val();

	if(document.pressed == 'save')
	{
		if(total_amt>=paid_amt)
		{
			$("button#btn_contractor").button('loading');
		    $.ajax({
						data:$("#flat_booking").serialize(),
						type:"POST",
						url:'insert_flat_booking.php',

						success: function(data)
						{
							$("button#btn_contractor").button('reset');
							  // alert(data);	
							if(data==1) 
							{
							    //alert('Voucher Inserted !!!');
							   swal({
									  position: 'top-right',
								      type: 'success',
									  title: 'New Flat Details Added',
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
		else{
			$('#paid_amt').css('borderColor','red');
			$('#msg').html('Paid Amount Is Greter than Total Amount');
			$('#msg').css('color','red');
		}

 }
 else
 	if(document.pressed == 'update')
	{
	  		   //alert(data);
          	e.preventDefault();
			if(total_amt>=paid_amt)
			{	
              		$("button#update").button('loading');
			        $.ajax({
								data:$("#flat_booking").serialize(),
								type:"POST",
								url:'update_flat_booking.php',
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
			  								  title: 'Flat Booking Info Has Been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=flat_booking";
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
										      window.location.href= "dashboard.php?page=flat_booking";
										 	} ,1500);
									}
									
								}

						   });
			  	}
				else{
					$('#paid_amt').css('borderColor','red');
					$('#msg').html('Paid Amount Is Greter than Total Amount');
					$('#msg').css('color','red');
				}
   			
			        
	       }

	      });

</script>