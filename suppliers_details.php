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

		$sql = mysql_query("SELECT * FROM supplier_details WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{}
?>
<div class="row">
	<h3>Suppliers Details</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Suppliers Details</h4>
	<form id="frm_supplier" name="frm_supplier" method="post" autocomplete="off">
       	<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
		<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
		<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
		<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
		
		<div class="col-md-3">
			<label>Material Supply Date <span class="required_field">*</span></label>
			<input type="date" name="material_supp_date" class="form-control" data-placeholder="Material Supply Date" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['material_supp_date'];}else{} ?>"/>
		</div>
		<div class="col-md-3">
			<label>Supplier Name <span class="required_field">*</span></label>
			<select name="vender_name" id="vender_name" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM supplier_details a INNER JOIN mst_supplier b ON a.supp_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$arr=mysql_fetch_array($sq);
					
				 ?>
				 <option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
				 <?php 
				 	$sq = mysql_query("SELECT * FROM mst_supplier")or die(mysql_error($connection));
						while($arr=mysql_fetch_array($sq))
						{
				  ?>
				  <option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
				 <?php } }else{?>
				<option value="">Select Supplier</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_supplier")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
				<?php } }?>
			</select>
		</div> 

		<div class="col-md-3">
			<label>Material <span class="required_field">*</span></label>
			<select name="txt_material_name" id="txt_material_name" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM supplier_details a INNER JOIN mst_material b ON a.material_name=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$arr=mysql_fetch_array($sq);
					
				 ?>
				 <option value="<?php echo $arr['id']; ?>"><?php echo $arr['mat_name']; ?>(<?php echo $arr['brand_name']; ?>)</option>
				 <?php 
				 	$sq = mysql_query("SELECT * FROM mst_material")or die(mysql_error($connection));
						while($arr=mysql_fetch_array($sq))
						{
				  ?>
				  <option value="<?php echo $arr['id']; ?>"><?php echo $arr['mat_name']; ?>(<?php echo $arr['brand_name']; ?>)</option>
				 <?php } }else{?>
				<option value="">Select Material</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_material")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['mat_name']; ?>(<?php echo $arr['brand_name']; ?>)</option>
				<?php } }?>
			</select>

		</div>
       	<div class="col-md-3">
			<label>Bill No <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_bill_no" id="txt_bill_no" placeholder="Bill No" value="<?php if(isset($rec_id)){echo $data['bill_no'];}else{} ?>" required>
		</div>
		<div class="panel-body"></div>
		 <div class="col-md-3">
			<label>Billing Date <span class="required_field">*</span></label>
			<input type="date" name="bill_date" class="form-control" data-placeholder="Billing Date" required aria-required="true" value="<?php if(isset($rec_id)){echo $data['bill_date'];}else{} ?>"/>
		</div>
		
		<div class="col-md-3">
			<label>Unit</label>
			<!-- <input type="text" class="form-control" name="unit" id="unit" placeholder="Unit"  value="<?php if(isset($rec_id)){echo $data['unit_id'];}else{} ?>" readonly=""> -->
			<select name="unit" id="unit" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM supplier_details a INNER JOIN mst_unit b ON a.unit_id=b.unit WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$arr=mysql_fetch_array($sq);
					
				 ?>
				 <option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				 <?php 
				 	$sq = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
						while($arr=mysql_fetch_array($sq))
						{
				  ?>
				  <option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				 <?php } }else{?>
				<option value="">Select Unit</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				<?php } }?>
			</select>	
		</div>

		<div class="col-md-3">
			<label>Rate <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="txt_rate" id="txt_rate" placeholder="Rate" value="<?php if(isset($rec_id)){echo $data['rate'];}else{} ?>" onkeyup="taxoncalculation();" required step=".01">
		</div>

		<div class="col-md-3">
			<label>Quantity <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="txt_qty" id="txt_qty" placeholder="Quantity" value="<?php if(isset($rec_id)){echo $data['qty'];}else{} ?>" onkeyup="taxoncalculation();" required step=".01">
		</div>
		
	
		<div class="panel-body"></div>
		<div class="col-md-3">
			<label>Basic Amount</label>
			<input type="text" class="form-control" name="txt_amount" id="txt_amount" placeholder="Basic Amount" value="<?php if(isset($rec_id)){echo $data['amount'];}else{} ?>" readonly>
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
			<input type="text" class="form-control" name="txt_sgst" id="txt_sgst" placeholder="SGST" value="<?php if(isset($rec_id)){echo $data['sgst'];}else{} ?>"  readonly>
		</div>
		<div class="col-md-3">
			<label>CGST</label>
			<input type="text" class="form-control" name="txt_cgst" id="txt_cgst" placeholder="CGST" value="<?php if(isset($rec_id)){echo $data['cgst'];}else{} ?>"  readonly>
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
			<label>Total Amount</label>
			<input type="text" class="form-control" name="txt_total_amt" id="txt_total_amt" placeholder="Total Amount" value="<?php if(isset($rec_id)){echo $data['total_amt'];}else{} ?>"  readonly>
		</div>
       
		<div class="col-md-3">
			<label>Paid Amount</label>
			<input type="number" class="form-control" name="txt_paid_amt" id="txt_paid_amt" placeholder="Paid Amount" value="<?php if(isset($rec_id)){echo $data['paid_amt'];}else{} ?>" onkeyup="taxoncalculation();" step=".01" >
		</div>
		<div class="col-md-3">
			<label>Balance Amount</label>
			<input type="text" class="form-control" name="txt_balance_amt" id="txt_balance_amt" placeholder="Balance Amount" value="<?php if(isset($rec_id)){echo $data['balence_amt'];}else{} ?>" readonly>
		</div>

		<div class="panel-body"></div>
		
		<div class="col-md-4">
		<?php 
			if(empty($rec_id)){
		 ?>
			<button name="btn_supplier" id="btn_supplier" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
		<?php }else{ ?>
			<button name="btn_supplier_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
		<?php } ?>
			<div id="msg"></div>
		</div>
	</form>
</div>

<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Suppliers List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Material Supply Date</th>
			  <th>Supplier Name</th>
			  <th>Material Name</th>
			  <th>Billing Date </th>
			  <th>Bill No</th>
			  <th>Unit</th>
			  <th>Qty</th>
			  <th>Rate</th>
			  <th>Basic Amt</th>
			  <th>Tax Rate(%)</th>
			  <th>Tax Amt</th>
			  <th>SGST</th>
			  <th>CGST</th>
			  <th>Total Amt</th>
			  <th>Paid Amt</th>
			  <th>Balance Amt</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	$sql = mysql_query("SELECT b.name,c.mat_name,c.brand_name, a.* FROM `supplier_details` a INNER JOIN mst_supplier b ON a.supp_id=b.id INNER JOIN mst_material c ON a.material_name=c.id ")or die(mysql_error($connection));
		  		while($row=mysql_fetch_array($sql))
		  		{
		  			$sr_no++;
		  			$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['material_supp_date']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].')'; ?></td>
			  <td><?php echo $row['bill_date']; ?></td>
			  <td><?php echo $row['bill_no']; ?></td>
			  <td><?php echo $row['unit_id']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td><?php echo $row['amount']; ?></td>
			  <td><?php echo $row['tax_value']; ?></td>
			  <td><?php echo $row['tax_amt']; ?></td>
			  <td><?php echo $row['sgst']; ?></td>
			  <td><?php echo $row['cgst']; ?></td>
			  <td><?php echo $row['total_amt']; ?></td>
			  <td><?php echo $row['paid_amt']; ?></td>
			  <td><?php echo $row['balence_amt']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=suppliers_details&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=suppliers_details&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
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
			    <h4 class="modal-title" align="center">Delete Supplier Details</h4>
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

<!-- script for select material information-->
<script>
$(document).ready(function(){
 	$('#txt_material_name').on('change',function(){
    var id = $(this).val();
        
      if(id!=null)
        {
          $.ajax({
                    type:'POST',
                    url: "get_material_info.php",
                    data:{
                            id:id
                    },
                    dataType: "JSON",
                    success:function(data)
                    {
                   		$('#txt_rate').val(data.rate);
                    	$('#unit').val(data.unit);
                    	// $('#avail_qty').val(data.qty);
                    }
                }); 
          }else{
              $('#txt_material_name').html('Select Material first'); 
          }
      });
});
</script>

<script>
onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var txt_qty = document.getElementById('txt_qty').value;
    var txt_rate = document.getElementById('txt_rate').value;
   	var tax = document.getElementById('select_tax').value;
   	var txt_paid_amt = document.getElementById('txt_paid_amt').value;

	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  

	var totalcost =  parseFloat(txt_qty) * parseFloat(txt_rate);//calculate base amt
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; //calculate tax on base amt
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); //amt after tax selection
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  
	// to calculate balance amount
	var bal_amt = parseFloat(totalcost)- parseFloat(txt_paid_amt); 
	var bal_amt_tax = parseFloat(totaltax)- parseFloat(txt_paid_amt); 

	if (!isNaN(totalcost)) 
	{
    	document.getElementById('txt_amount').value = parseFloat(totalcost).toFixed(2);
    }
    	if(!isNaN(totaltax)){
    		document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
    		document.getElementById('txt_balance_amt').value = parseFloat(totaltax).toFixed(2);
	    }else{
	    	document.getElementById('txt_total_amt').value = parseFloat(totalcost).toFixed(2);
	    	document.getElementById('txt_balance_amt').value = parseFloat(totalcost).toFixed(2);
	    }

	    if(!isNaN(bal_amt_tax)){
    		document.getElementById('txt_balance_amt').value = parseFloat(bal_amt_tax).toFixed(2);
	    }else if (!isNaN(bal_amt)){
	    	document.getElementById('txt_balance_amt').value = parseFloat(bal_amt).toFixed(2);
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

	var txt_rate = document.getElementById('txt_rate').value;
	var tax = document.getElementById('select_tax').value;
	var txt_paid_amt = document.getElementById('txt_paid_amt').value;

	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  

    var txt_qty = document.getElementById('txt_qty').value;
    // To calculate cost of material 
	var totalcost =  parseFloat(txt_rate) * parseFloat(txt_qty);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	var gst_amt = parseFloat(rtax)/2;// To calulate amount of SGST and CGST  
	// to calculate balance amount
	var bal_amt = parseFloat(totalcost)- parseFloat(txt_paid_amt); 
	var bal_amt_tax = parseFloat(totaltax)- parseFloat(txt_paid_amt); 

    if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_total_amt').value = parseFloat(totaltax).toFixed(2);
    	document.getElementById('txt_balance_amt').value = parseFloat(totaltax).toFixed(2);
    }
    	// to calculate balance amount
    	if(!isNaN(bal_amt_tax)){
    		document.getElementById('txt_balance_amt').value = parseFloat(bal_amt_tax).toFixed(2);
	    }else if (!isNaN(bal_amt)){
	    	document.getElementById('txt_balance_amt').value = parseFloat(bal_amt).toFixed(2);
	    }
        document.getElementById('tax_amt').value = parseFloat(rtax).toFixed(2);
    	document.getElementById('txt_sgst').value = parseFloat(gst_amt).toFixed(2);
    	document.getElementById('txt_cgst').value = parseFloat(gst_amt).toFixed(2);
} 

//script to hide and show textbox in select box
	$(document).ready(function() {
		$('#txt_type_work').change(function(){
		if($('#txt_type_work').val() == 'Other')
		   {
		   $('#other').css('display', 'block'); 
		      }
		else
		   {
		   $('#other').css('display', 'none');
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
            url:'supp_delete.php',
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

$('form#frm_supplier').submit(function(e){

    e.preventDefault();
	var paid_amt = $('#txt_paid_amt').val();
	var total_amt = $('#txt_total_amt').val();

  	if(document.pressed == 'save')
	{
	  	if(total_amt>=paid_amt)
	  	{	         
			$("button#btn_supplier").button('loading');
	    	$.ajax({
					data:$("#frm_supplier").serialize(),
					type:"POST",
					url:'insert_supp_detials.php',

					success: function(data)
					{
						$("button#btn_supplier").button('reset');
						if(data==1) 
						{
						   	swal({
								  	position: 'top-right',
								    type: 'success',
									title: 'New Supplier Details Added',
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
			$('#txt_paid_amt').css('borderColor','');
   			$('#msg').html('');
   		}
   		else{
   			$('#txt_paid_amt').css('borderColor','red');
   			$('#msg').html('Paid Amount Is Greter Than Total Amount');
   			$('#msg').css('color','red');
   		}       	
}
else
    if(document.pressed == 'update')
  	{
        if(total_amt>=paid_amt)
	  	{	  	 
      		$("button#update").button('loading');
	        $.ajax({
						data:$("#frm_supplier").serialize(),
						type:"POST",
						url:'update_supp_details.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
							{
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Supplier Deatils Info Has Been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=suppliers_details";
								 	} ,1500);
				
							}
							else if(data==3)
							{
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Supplier Deatils Info Has Been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=suppliers_details";
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
			    $('#txt_paid_amt').css('borderColor','');
   				$('#msg').html('');
	   		}
	   		else{
	   			$('#txt_paid_amt').css('borderColor','red');
	   			$('#msg').html('Paid Amount Is Greter Than Total Amount');
	   			$('#msg').css('color','red');
	   		}   
	}
	return true;
});
</script>