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

		$sql = mysql_query("SELECT * FROM mst_material WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
<h3> Material</h3><hr>

	<div class="col-lg-12">
		<h4>Material Details</h4>
		<form id="frm_material" name="frm_material" autocomplete="off" method="POST" >
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			
			<div class="col-md-3">
				<label>Material Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Material Name"  value="<?php if(isset($rec_id)){echo $data['mat_name'];}else{} ?>" style="text-transform:capitalize;" required="">
			</div>
			<div class="col-md-3">
				<label>Brand Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name"  value="<?php if(isset($rec_id)){echo $data['brand_name'];}else{} ?>" style="text-transform:capitalize;" required="">

			</div>
			<div class="col-md-4">
				<label>Description</label>
				<textarea class="form-control" name="txt_description" id="txt_description" placeholder="Description"><?php if(isset($rec_id)){echo $data['description'];}else{} ?></textarea>
			</div>
			
			<div class="panel-body"></div>
			<div class="col-md-3">
				<label>Unit <span class="required_field">*</span></label>
				<select class="form-control" name="txt_unit" id="txt_unit" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT * FROM `mst_material` a INNER JOIN mst_unit b ON a.unit=b.unit WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['unit']; ?>"><?php echo $row1['unit']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM `mst_unit` ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Unit</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM `mst_unit` ORDER BY `mst_unit`.`unit` ASC")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>
				<?php } } ?>
				</select>

			</div>
			<div class="col-md-3">
				<label>Rate <span class="required_field">*</span></label>
				<input type="number" class="form-control" name="txt_rate" id="txt_rate" placeholder="Rate" value="<?php if(isset($rec_id)){echo $data['rate'];}else{} ?>" required="" onkeyup="taxoncalculation();" step=".01">
			</div>
	 		<div class="panel-body"></div>
			<div class="col-md-12">

			<?php if(empty($rec_id)){?>
				<button name="btn_material" id="btn_material" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
				<button name="btn_material_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<?php } ?>
				<div id="msg"></div>

			</div>

		</form>
	</div>

	<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Material List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Material Name</th>
			  <th>Brand Name</th>
			  <th>Description</th>
			  <th>Unit</th>
			  <th>Rate</th> 
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  	 <?php 
		  $sr_no=0;
		  		$sql = mysql_query("SELECT * FROM mst_material ")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['mat_name']; ?></td>
			  <td><?php echo $row['brand_name']; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=material&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=material&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
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
			    <h4 class="modal-title" align="center">Delete Material</h4>
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
	var txt_qty = document.getElementById('txt_qty').value;
    var txt_rate = document.getElementById('txt_rate').value;
   	var tax = document.getElementById('select_tax').value;
	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  

	var totalcost =  parseFloat(txt_qty) * parseFloat(txt_rate);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  

	if (!isNaN(totalcost)) 
	{
    	document.getElementById('txt_amount').value = parseFloat(totalcost).toFixed(2);
    }
    	if(!isNaN(totaltax)){
    		document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
	    }else{
	    	document.getElementById('txt_total_amt').value = parseFloat(totalcost).toFixed(2);
	    }
    	document.getElementById('txt_sgst').value = parseFloat(gst_amt);
    	document.getElementById('txt_cgst').value = parseFloat(gst_amt);
    	document.getElementById('tax_amt').value = parseFloat(rtax);
    	
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

	var txt_rate = document.getElementById('txt_rate').value;
	var tax = document.getElementById('select_tax').value;
	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  

    var txt_qty = document.getElementById('txt_qty').value;
    // To calculate cost of material 
	var totalcost =  parseFloat(txt_rate) * parseFloat(txt_qty);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  
	
    if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
    }
        document.getElementById('tax_amt').value = parseFloat(rtax);
    	document.getElementById('txt_sgst').value = parseFloat(gst_amt);
    	document.getElementById('txt_cgst').value = parseFloat(gst_amt);
} 


</script>


<!-- Delete Script start -->
<script>
$("#delete_btn").click(function(e)
{ 
    var id=$('#del_id').val();
  	e.preventDefault();

   	$.ajax({
	            url:'delete_material.php',
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
<!-- Insert Script -->
<script>
$('form#frm_material').submit(function(e){

    e.preventDefault();
	
	if(document.pressed == 'save')
	{
	  	  $("button#btn_material").button('loading');

		    $.ajax({
						data:$("#frm_material").serialize(),
						type:"POST",
						url:'insert_material.php',
						success: function(data)
						{
							$("button#btn_material").button('reset');
							if(data==1) 
							{
							   swal({
									  position: 'top-right',
									      type: 'success',
										  title: 'New Material Added',
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
								$('#msg').html('Alredy Exist');
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
								data:$("#frm_material").serialize(),
								type:"POST",
								url:'update_material.php',
								success: function(data)
								{
									$("button#update").button('reset');

									if(data==1)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Material Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=material";
										 	} ,1500);
						
									}
									else if(data==3)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Material Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=material";
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
