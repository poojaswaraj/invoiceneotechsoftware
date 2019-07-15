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

		$sql = mysql_query("SELECT * FROM pay_info WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
	<h3>Payment Paid</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Payment Details</h4>
	<form id="frm_payment_paid" name="frm_payment_paid" method="post" autocomplete="off">
        <input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			
		<div class="col-md-3">
		<label>Party Name <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_name" id="name" placeholder="Name of Party" value="<?php if(isset($rec_id)){echo $data['name'];}else{} ?>" required>
		</div>
		
		<div class="col-md-3">
		<label>Payment Date <span class="required_field">*</span></label>
			<input type="date" name="payment_date" class="form-control" data-placeholder="Payment Date" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['payment_date'];}else{} ?>" />
		</div>

		<div class="col-md-3">
		<label>Bill No <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_bill_no" id="bill_no" placeholder="Bill No" value="<?php if(isset($rec_id)){echo $data['bill_no'];}else{} ?>" required>
		</div>
		<div class="col-md-3">
		<label>Billing Date <span class="required_field">*</span></label>
			<input type="date" name="bill_date" class="form-control" data-placeholder="Billing Date" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['bill_date'];}else{} ?>" required/>
		</div>
		<div class="panel-body"></div>
		
		<div class="col-md-3">
		<label>Basic Amount <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="txt_amount" id="txt_amount" placeholder="Basic Amount" value="<?php if(isset($rec_id)){echo $data['amount'];}else{} ?>" onkeyup="taxoncalculation();" required step=".01">
		</div>
		
		<!-- for tax selection -->
		<div class="col-md-3">	
			<div class="col-md-12">
				<label>Select Tax</label>
			</div>
			<div class="col-md-6">
				<button type="button" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="false" style="padding: 4% 10%;"> <span class="icon fa fa-caret-down"></span></button>
		        <ul class="dropdown-menu" role="menu">
	            <?php
					$temp=0;
					$recn=mysql_query("SELECT count(id) FROM tax WHERE active=1 and is_default=1");
					$rowcn = mysql_fetch_array($recn);
					$count=$rowcn['count(id)'];
					$result=mysql_query("SELECT * FROM tax WHERE active=1 and is_default=1");
					while($r = mysql_fetch_array($result)){
				?>
		            <li>
		              <div class="col-md-12" style="font-size:12px;">
		                <input type="radio" name="chk[]"  id="<?php echo "game".$temp++;?>" onClick="UpdateCost()" <?php echo $r["is_default"];?> value="<?php echo $r["value"];?>" onkeyup="taxoncalculation();"/>
		                <?php echo $r["name"];?> @ <?php echo $r["value"];?>%

		              </div>
		            </li>
		            <?php }?>
		        </ul><input type="hidden" name="taxcount" id="taxcount" value="<?php echo $count;?>">
		    </div>
		    <div class="col-md-6">
		        <?php 
			  		$defqry=mysql_query("SELECT * FROM tax WHERE `is_default` = '1'");
					$defrow = mysql_fetch_array($defqry);
			     ?>
		        <input type="text" readonly name="select_tax" id="select_tax" placeholder="Tax Percentage" value="<?php if(isset($rec_id)){echo $data['tax_value'];}else{} ?>" maxlength="6" class="form-control" <?php if(!empty($defrow['value'])) { echo "readonly=\"readonly\""; } ?> onkeyup="taxoncalculation();" onkeypress="return onlyNos(event,this);" style="margin-left: -65%; width: 145%;"/>

		        <input type="hidden" class="form-control" name="tax_amt" id="tax_amt" placeholder="Tax Amount" value="<?php if(isset($rec_id)){echo $data['tax_amt'];}else{} ?>" onkeyup="taxoncalculation();">

			</div>
			<!-- end of tax selection -->
		</div>

		<div class="col-md-3">
		<label>SGST</label>
			<input type="text" class="form-control" name="txt_sgst" id="txt_sgst" placeholder="SGST" value="<?php if(isset($rec_id)){echo $data['sgst'];}else{} ?>" readonly>
		</div>
		<div class="col-md-3">
		<label>CGST</label>
			<input type="text" class="form-control" name="txt_cgst" id="txt_cgst" placeholder="CGST" value="<?php if(isset($rec_id)){echo $data['cgst'];}else{} ?>" readonly>
		</div>
		<div class="panel-body"></div>
			<div class="col-md-3">
			<label>Total Amount</label>
				<input type="text" class="form-control" name="txt_total_amt" id="txt_total_amt" placeholder="Total Amount" value="<?php if(isset($rec_id)){echo $data['total_amt'];}else{} ?>" readonly>
			</div>
		<div class="panel-body"></div>
 		<div class="col-md-4">
 			<div class="col-md-12">
				<?php 
					if(empty($rec_id)){
			 	?>
				<button name="btn_pay_paid" id="btn_pay_paid" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
				<?php }else{ ?>
				<button name="btn_pay_paid_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
				<?php } ?>
				<div id="msg"></div>
			</div>
		</div>
	</form>
</div>

<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Payment Paid List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Party Name</th>
			  <th>Payment Date</th>
			  <th>Bill No</th>
			  <th>Billing Date </th>
			  <th>Basic Amount</th>
			  <th>Tax Rate(%)</th>
			  <th>Tax Amt</th>
			  <th>SGST</th>
			  <th>CGST</th>
			  <th>Total Amount</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  	<?php 
		  $sr_no=0;
		  		$sql = mysql_query("SELECT * FROM pay_info WHERE type='paid'")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  ?>
		  <tbody>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['payment_date']; ?></td>
			  <td><?php echo $row['bill_no']; ?></td>
			  <td><?php echo $row['bill_date']; ?></td>
			  <td><?php echo $row['amount']; ?></td>
			  <td><?php echo $row['tax_value']; ?></td>
			  <td><?php echo $row['tax_amt']; ?></td>
			  <td><?php echo $row['sgst']; ?></td>
			  <td><?php echo $row['cgst']; ?></td>
			  <td><?php echo $row['total_amt']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=payment_paid&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
		  	  <?php }else{ ?>
		  	  	<a href='user_dashboard.php?page=payment_paid&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
		  	  <?php } ?> |
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
			    <h4 class="modal-title" align="center">Delete Paypaid Info</h4>
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
	var txt_amount = document.getElementById('txt_amount').value;
   	var tax = document.getElementById('select_tax').value;
	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  
	// calculate tax
	var rtax = parseFloat(txt_amount)* parseFloat(tax)/100; //calculate tax on base amt
	var totaltax = parseFloat(txt_amount)+ parseFloat(rtax); //amt after tax selection
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  

	if (!isNaN(txt_amount)) 
	{
    	document.getElementById('txt_total_amt').value = parseFloat(txt_amount).toFixed(2);
    }
    	if(!isNaN(totaltax)){
    		document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
	    }else{
	    	document.getElementById('txt_total_amt').value = parseFloat(txt_amount).toFixed(2);
	    }

    	document.getElementById('txt_sgst').value = parseFloat(gst_amt).toFixed(2);
    	document.getElementById('txt_cgst').value = parseFloat(gst_amt).toFixed(2);
    	document.getElementById('tax_amt').value = parseFloat(rtax).toFixed(2);
}

// To calculate tax on amount
function UpdateCost() {
  var sum = 0;
  var gn, elem;
  var a = document.getElementById('taxcount').value;
  for (i=0; i<a; i++) {
    gn = 'game'+i;
    elem = document.getElementById(gn);
    if (elem.checked == true) { sum += Number(elem.value); }
  }
 	document.getElementById('select_tax').value = sum.toFixed(2);

	var txt_amount = document.getElementById('txt_amount').value;
	var tax = document.getElementById('select_tax').value;
	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  
	// calculate tax
	var rtax = parseFloat(txt_amount)* parseFloat(tax)/100; 
	var totaltax = parseFloat(txt_amount)+ parseFloat(rtax); 
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  

    if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
    	
    }
        document.getElementById('tax_amt').value = parseFloat(rtax).toFixed(2);
    	document.getElementById('txt_sgst').value = parseFloat(gst_amt).toFixed(2);
    	document.getElementById('txt_cgst').value = parseFloat(gst_amt).toFixed(2);
} 
</script>
<!-- Delete Script start -->
<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_pay_paid.php',
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

$('form#frm_payment_paid').submit(function(e){

    e.preventDefault();
	
  	if(document.pressed == 'save')
	{
	  	  $("button#btn_pay_paid").button('loading');

			        $.ajax({
								data:$("#frm_payment_paid").serialize(),
								type:"POST",
								url:'insert_pay_paid.php',
								success: function(data)
								{
									$("button#btn_pay_paid").button('reset');
									 // alert(data);
									if(data==1) 
									{
									   swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Pay Paid Added',
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
								data:$("#frm_payment_paid").serialize(),
								type:"POST",
								url:'update_pay_paid.php',
								success: function(data)
								{
									$("button#update").button('reset');

									if(data==1)
									{
										//alert('Updated Successfully !!!');
										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Pay Paid info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=payment_paid";
										 	} ,1500);
						
									}
									else if(data==3)
									{
										//alert('Updated Successfully !!!');
										
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Pay Paid info has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=payment_paid";
										 	} ,1500);
									}
									else if(data==2)
									{
										alert('Error....');
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