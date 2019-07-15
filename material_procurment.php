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

		$sql = mysql_query("SELECT * FROM material_procurement WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
		$data['date']='';
		$data['supp_id']='';
		$data['pro_id']='';
		$data['mate_id']='';	
		$data['description']='';	
		$data['unit']='';
		$data['rate']='';
		$data['qty']='';
		$data['tax_value']='';
		$data['tax_amt']='';	
		$data['total_amt']='';
		$data['sgst']='';
		$data['cgst']='';
		$data['grn']='';
		$data['po_wo_no']='';
		$data['challan']='';
		$data['gadi_no']='';
		$data['batch_no']='';
	}

?>
<div class="row">
	<h3>Material Inward Register</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Material Inward</h4>
	<form id="mate_procurment" name="mate_procurment" method="post" autocomplete="off">
		<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
		<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
		<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
		<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
		<div class="col-md-3">
		<label>Date <span class="required_field">*</span></label>
			<input type="date" name="date" id="date" class="form-control" data-placeholder="Date" required aria-required="true" value="<?php echo $data['date'];?>"/>
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
			    $('#date').attr('max', maxDate);
			});

		</script>
		
		<div class="col-md-3">
		<label>Supplier Name <span class="required_field">*</span></label>
			<select name="supplier_name" id="supplier_name" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM material_procurement a INNER JOIN mst_supplier b ON a.supp_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
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
		<label>Material Name <span class="required_field">*</span></label>
			<select name="material_name" id="material_name" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM material_procurement a INNER JOIN mst_material b ON a.mate_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
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
		<label>Description</label>
			<textarea class="form-control" name="txt_desc" id="txt_desc" placeholder="Description" readonly=""><?php echo $data['description']; ?></textarea>
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
		<label>Unit</label>
			<!-- <input type="text" class="form-control" name="txt_unit" id="txt_unit" placeholder="Unit" value="<?php echo $data['unit']; ?>" readonly=""> -->
			<select name="txt_unit" id="txt_unit" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM material_procurement a INNER JOIN mst_unit b ON a.unit=b.unit WHERE a.id='$rec_id'")or die(mysql_error($connection));
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
			<input type="number" class="form-control" name="txt_rate" id="txt_rate" placeholder="Rate" value="<?php echo $data['rate']; ?>" step=".01" onkeyup="taxoncalculation();">
		</div>
		<div class="col-md-3">
		<label>Quantity <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="txt_qty" id="txt_qty" placeholder="Quantity" step=".01" onkeyup="taxoncalculation();" value="<?php echo $data['qty']; ?>" required="">
		</div>

		<div class="col-md-3">
		<label>Basic Amount</label>
			<input type="text" class="form-control" name="txt_amount" id="txt_amount" placeholder="Basic Amount" value="<?php if(isset($rec_id)){echo $data['amount'];}else{} ?>" readonly>
		</div>
		<div class="panel-body"></div>

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
			<input type="text" class="form-control" name="txt_sgst" id="txt_sgst" placeholder="SGST" readonly="" value="<?php echo $data['sgst']; ?>">
		</div>
		
		<div class="col-md-3">
		<label>CGST</label>
			<input type="text" class="form-control" name="txt_cgst" id="txt_cgst" placeholder="CGST" readonly="" value="<?php echo $data['cgst']; ?>">
		</div>

		<div class="col-md-3">
		<label>Total Amount</label>
			<input type="text" class="form-control" name="txt_total_amt" id="txt_total_amt" placeholder="Total Amount" readonly="" value="<?php echo $data['total_amt']; ?>">
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
		<label>Project Name <span class="required_field">*</span></label>
			<select name="sel_project" id="sel_project" class="form-control" >
			<?php 
				if(!empty($rec_id))
				{	
				  $sq = mysql_query("SELECT b.* FROM material_procurement a INNER JOIN new_project b ON a.pro_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
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
		<div class="col-md-3">
		<label>GRN</label>
			<input type="text" class="form-control" name="grn" id="grn" placeholder="Good Received Number"  value="<?php echo $data['grn']; ?>">
		</div>
		<div class="col-md-3">
		<label>PO/WO No</label>
			<input type="text" class="form-control" name="po_wo_no" id="po_wo_no" placeholder="PO / WO No" value="<?php echo $data['po_wo_no']; ?>">
		</div>

		<div class="col-md-3">

		<label>Challan No</label>
			<input type="text" class="form-control" name="challan_no" id="challan_no" placeholder="Challan No" value="<?php echo $data['challan']; ?>">
			<div id="msg4"></div>
		</div>
		
		<div class="panel-body"></div>
		<div class="col-md-3">
		<label>Batch No</label>
			<input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No" value="<?php echo $data['batch_no']; ?>">
		</div>

	
		<div class="col-md-3">
		<label>Gadi No</label>
			<input type="text" class="form-control" name="gadi_no" id="gadi_no" placeholder="Gadi No" value="<?php echo $data['gadi_no']; ?>">
		</div>
		<div class="panel-body"></div>
 		<div class="col-md-4">
 		<?php if(empty($rec_id)){ ?>
			<button name="btn_supplier"  id="btn_supplier" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
		<?php }else{ ?>
			<button name="btn_supplier_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
		<?php } ?>
			<div id="msg"></div>
		</div>
		
	</form>
</div>

<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Material Inward Register List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Date</th>
			  <th>Project</th>
			  <th>Supplier</th>
			  <th>Material</th>
			  <th>Descriptions</th>
			  <th>Unit</th>
			  <th>Rate</th>
			  <th>Qty</th>
			  <th>Basic Amt</th>
			  <th>Tax Rate(%)</th>
			  <th>Tax Amt</th>
			  <th>SGST</th>
			  <th>CGST</th>
			  <th>Total Amt</th>
			  <th>GRN</th>
			  <th>PO/WO No</th>
			  <th>Challan No</th>
			  <th>Batch No</th>
			  <th>Gadi No</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	if($utype=='admin'){
		  		$sql = mysql_query("SELECT b.mat_name,b.brand_name,c.name,d.pro_name, a.* FROM `material_procurement` a INNER JOIN mst_material b ON a.mate_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id INNER JOIN new_project d ON a.pro_id=d.id")or die(mysql_error($connection));
		  	}else{
		  		$sql = mysql_query("SELECT b.mat_name,b.brand_name,c.name,d.pro_name, a.* FROM `material_procurement` a INNER JOIN mst_material b ON a.mate_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id INNER JOIN new_project d ON a.pro_id=d.id INNER JOIN `project_team` f ON d.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
		  	}
		  		while ($row=mysql_fetch_array($sql)) {
		  			$sr_no++;
		  			$id = $row['id'];
		   ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].')';?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
			  <td><?php echo $row['amount']; ?></td>
			  <td><?php echo $row['tax_value'];?></td>
			  <td><?php echo $row['tax_amt'];?></td>
			  <td><?php echo $row['sgst']; ?></td>
			  <td><?php echo $row['cgst']; ?></td>
			  <td><?php echo $row['total_amt']; ?></td>
		      <td><?php echo $row['grn']; ?></td> 
			  <td><?php echo $row['po_wo_no']; ?></td>
			  <td><?php echo $row['challan']; ?></td>
			  <td><?php echo $row['batch_no']; ?></td>
			  <td><?php echo $row['gadi_no']; ?></td>
			 
			  <td>
			  <?php if($utype=='admin'){ ?>
			  	<a href='dashboard.php?page=material_procurment&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
		  	<?php }else{ ?>
		  		<a href='user_dashboard.php?page=material_procurment&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
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
			    <h4 class="modal-title" align="center">Delete Material Inward</h4>
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
    $('#material_name').on('change',function(){
        var id = $(this).val();

      if(id)
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
                   		$('#txt_desc').val(data.description);
                    	$('#txt_unit').val(data.unit);
                    	$('#txt_rate').val(data.rate);
                    }
                }); 
          }else{
              $('#material_name').html('Select Material first'); 
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

	var tax_div =parseFloat(tax)/2;// To calulate Percentage of SGST and CGST  

	var totalcost =  parseFloat(txt_qty) * parseFloat(txt_rate);//calculate base amt
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; //calculate tax on base amt
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); //amt after tax selection
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
            url:'delete_procurment.php',
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

<script>

$('form#mate_procurment').submit(function(e){

    e.preventDefault();
	
  	if(document.pressed == 'save')
	{
		//var challan=$("#challan_no").val();
			$.ajax({
				data:$("#mate_procurment").serialize(),
				type:"POST",
				url:'insert_mater_procurment1.php',

				success: function(data)
				{
					//alert(data);


    if(data==3)
    {

	  	  var conf=confirm("This Challan No Already Exist, If you want to add again Then Click OK!");
    
       if(conf==true)
      {
    
		$("button#btn_supplier").button('loading');
    	$.ajax({
				data:$("#mate_procurment").serialize(),
				type:"POST",
				url:'insert_mater_procurment.php',

				success: function(data)
				{
					$("button#btn_supplier").button('reset');
					  //alert(data);
					if(data==1) 
					{
						//alert(1);
					   swal({
							  	position: 'top-right',
							    type: 'success',
								title: 'New Material Inward Details Added',
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

					// 	else if(data==3)
					// {
					// 	//alert('Error..');
					// 	confirm("Sure to add this challan number Replicated!");	
					// 	// $('#msg4').html('challen number already exist');
					// 	// $('#msg4').css('color','red');
					// 	return false;
					// } 
				}
			});
			       	
	}
}
	else if(data==4){
	      $("button#btn_supplier").button('loading');
    	$.ajax({
				data:$("#mate_procurment").serialize(),
				type:"POST",
				url:'insert_mater_procurment.php',

				success: function(data)
				{
					$("button#btn_supplier").button('reset');
					  //alert(data);
					if(data==1) 
					{
						//alert(1);
					   swal({
							  	position: 'top-right',
							    type: 'success',
								title: 'New Material Inward Details Added',
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

					// 	else if(data==3)
					// {
					// 	//alert('Error..');
					// 	confirm("Sure to add this challan number Replicated!");	
					// 	// $('#msg4').html('challen number already exist');
					// 	// $('#msg4').css('color','red');
					// 	return false;
					// } 
				}
			});

}
}
});
}
		else
	    if(document.pressed == 'update')
	  	{
          	 
              		$("button#update").button('loading');
			        $.ajax({
								data:$("#mate_procurment").serialize(),
								type:"POST",
								url:'update_mater_procurment.php',
								success: function(data)
								{
									$("button#update").button('reset');
									if(data==1)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Inward Deatils Info Has Been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "user_dashboard.php?page=material_procurment";
										 	} ,1500);
									}
									else if(data==3)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Inward Deatils Info Has Been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=material_procurment";
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
										// alert('Error....');
										$('#msg4').html('challen number allready exist');
										$('#msg4').css('color','red');
										return false;
									} 
								}
						   });
			       
	       			}
	       			return true;
	       		});


	  	</script>