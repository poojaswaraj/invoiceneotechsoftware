<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];

	if(isset($_GET['id']))
	{
		$rec_id = $_GET['id'];

		$que = mysql_query("SELECT c.name as State,c.state_code,d.ct_name,b.name,b.email,b.contact,b.panno,b.gst_no,b.comp_name,b.state,b.city,b.address,a.* FROM `tbl_po` a INNER JOIN mst_supplier b ON a.supp_id=b.id INNER JOIN tbl_states c ON c.id=b.state INNER JOIN city d ON d.ct_id=b.city WHERE a.id='$rec_id'")or die(mysql_error($connection));
		$data = mysql_fetch_array($que);
		

	}
	else{
	 $assign=$_POST['mult_po'];
	 $aa=array();
	 foreach($assign as $chk)
		{
			$aa[]=$chk;
		}
		$values= implode(',',$aa);
	}
		
?>
<form id="myform" name="frm_purchase" autocomplete="off" method="POST" >
<div class="row">
<h3>Edit Purchase Order</h3><hr>

<h4>Supplier Info</h4>
<!-- <form id="myform" name="frm_purchase" autocomplete="off" action="code.php" method="POST"> -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
<input type="hidden" class="form-control" name="txt_id" id="txt_id" value="<?php echo $rec_id; ?>">
<div class="col-lg-9">
	<div class="col-md-6">
		<label>Supplier Name  <span class="required_field">*</span></label>
		<!-- <input type="text" class="form-control" name="txt_sname" id="txt_sname" placeholder="Supplier Name" style="text-transform:capitalize;"  onkeyup="supp();" required=""> -->
		<select name="supplier_name" id="supplier_name" class="form-control" required="">
			<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM tbl_po a INNER JOIN mst_supplier b ON a.supp_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
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
		<label>Supplier PAN No</label>
		<input type="text" class="form-control" name="supp_pan" id="supp_pan" placeholder="Supplier PAN No." value="<?php if(isset($rec_id)){echo $data['panno'];}else{}  ?>" readonly="">
	</div>
	<div class="col-md-3">
		<label>Supplier GST No</label>
		<input type="text" class="form-control" name="txt_gstno" id="txt_gstno" placeholder="Supplier GST No" value="<?php if(isset($rec_id)){echo $data['gst_no'];}else{}  ?>" readonly="">
	</div>
	<div class="panel-body"></div>
	
	<div class="col-md-12">
		<div class="col-md-6">
			<label>Company Name <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="supp_comp" id="supp_comp" placeholder="Company Name" value="<?php if(isset($rec_id)){echo $data['comp_name'];}else{}  ?>" required="" readonly>
		</div>

		<div class="col-md-6">
			<label>Supplier Email <span class="required_field">*</span></label>
			<input type="email" class="form-control" name="txt_cemail" id="txt_cemail" placeholder="Supplier Email" value="<?php if(isset($rec_id)){echo $data['email'];}else{}  ?>" required="" readonly >
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6">
			<label>State <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_state" id="txt_state" placeholder="State" onkeyup="state()" value="<?php if(isset($rec_id)){echo $data['State'];}else{}  ?>" readonly="">
		</div>

		<div class="col-md-6">
			<label>State Code</label>
			<input type="text" class="form-control" name="txt_code" id="txt_code" placeholder="State Code" value="<?php if(isset($rec_id)){echo $data['state_code'];}else{}  ?>" readonly="">
		</div>
	</div>
	<div class="panel-body"></div>

	<div class="col-md-6">
		<label>City <span class="required_field">*</span></label>
		<input type="text" class="form-control" name="txt_city" id="txt_city" placeholder="State Code" value="<?php if(isset($rec_id)){echo $data['ct_name'];}else{}  ?>" readonly="">
	</div>
	<div class="col-md-6">
		<label>Address <span class="required_field">*</span></label>
		<textarea class="form-control" name="txt_iaddr" id="txt_iaddr" placeholder=" Address" required="" readonly=""><?php if(isset($rec_id)){echo $data['address'];}else{}?></textarea>
	</div>
</div>
<div class="col-lg-3">
	<!-- <div class="panel-body"></div><br> -->
	<div class="panel-body"></div>
	<div class="col-md-12">
		<h5 style="text-align: center;"><label>Purchase Order Details</label></h5>
	</div>
	<div class="col-md-12">
		<label>PO/WO No <span class="required_field">*</span></label>
		<input type="text" class="form-control" name="po_no" id="po_no" placeholder="PO/WO No" required="" value="<?php if(isset($rec_id)){echo $data['po_no'];}else{}  ?>">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-12">
		<label>PO Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="po_date" id="po_date" data-placeholder="PO Date" required="" value="<?php if(isset($rec_id)){echo $data['po_date'];}else{}  ?>">
	</div>
	<div class="panel-body"></div>
<!-- 
	<div class="col-md-12">
	<label>Project Name </label>
		<input type="text" class="form-control" name="proj_name" id="proj_name" placeholder="Project Name">
	</div> -->
</div>

<div class="panel-body"></div>

<div class="col-lg-12">

<div class="panel-body"></div>

<div class="col-lg-12" id="products">
  <div class="panel panel-default">
    <div style="height: 200px; overflow-y: scroll; overflow-x: hidden;">
      <table>
	  <thead>
		<tr>
		  <!-- <th>Sr. No</th> -->
		  <!-- <th>Date</th> -->
		  <th>Supplier</th>
		  <th>Project</th>
		  <th>Material</th>
		  <th>Descriptions</th>
		  <th>Unit</th>
		  <th>Quantity</th>
		  <th>Rate</th>
		  <th>Taxes</th>
		  <th>Total Amount</th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
	  	$sr_no=0;
	  	if(empty($rec_id))
	  	{
	  	$sq = mysql_query("SELECT t.state_code,d.name,b.pro_name,c.mat_name,c.brand_name, a.* FROM `daily_material_requisition` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN mst_supplier d ON d.id=a.supp_id INNER JOIN tbl_states t ON t.id=d.state WHERE a.id IN ($values)")or die(mysql_error($connection));
	  }else{
	  	$sq = mysql_query("SELECT k.description as descs,k.unit as unt,k.tax_amt as Tax_amt,t.state_code,d.name,b.pro_name,c.mat_name,c.brand_name, a.* FROM `tbl_po` a  INNER JOIN daily_material_requisition h ON a.req_id=h.id INNER JOIN new_project b ON h.pro_id=b.id INNER JOIN mst_material c ON h.mate_id=c.id INNER JOIN mst_supplier d ON d.id=a.supp_id INNER JOIN tbl_states t ON t.id=d.state INNER JOIN tbl_po_matrials k ON a.id=k.po_id WHERE a.id='$rec_id'")or die(mysql_error($connection));
	  }
		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$sr_no++;
		  		$id1= $row['id'];
		  		$req_id= $row['req_id'];
		  		$tax = $row['Tax_amt'];
		  		$a=$tax/2; // Divide tax into SGST and CGST
	  ?>
		<tr>
			 <!-- <td><?php echo $sr_no; ?></td> -->
			  <!-- <td><?php echo $row['date']; ?></td> -->
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].")"; ?></td>
			  <td><?php echo $row['descs']; ?></td>
			  <td><?php echo $row['unt']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td>

			  <?php 
			  	if($utype=='admin')
				{
			  		$sql111 = mysql_query("SELECT * FROM company where user_id='$user_id'")or die(mysql_error($connection));
				}
				else{
				  	$sql111 = mysql_query("SELECT * FROM company where user_id='$sub_id'")or die(mysql_error($connection));
				}
                   $res = mysql_fetch_array($sql111);

			  	$sel=mysql_query("SELECT b.sgst,b.cgst,b.igst,b.value FROM tbl_po_matrials a INNER JOIN tax b ON b.value=a.tax_value  where a.po_id=$id1");
					while($arr=mysql_fetch_array($sel))
						{
							$code=$res['state_code'];
							$cod=$row['state_code'];

							if ($code==$cod) {
							echo "<br>".$arr['sgst'];echo "&nbsp;-&nbsp;Rs.".$a; echo "<br>".$arr['cgst'];echo "&nbsp;-&nbsp;Rs.".$a;
							}
							else{
								echo "<br>".$arr['igst'];echo "&nbsp;-&nbsp;Rs.".$tax;
							}	
						}
				?>
			  </td>
			  <td><?php echo $row['grand_total']; ?></td>
			  <td><button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="get_data('<?php echo $row['req_id'];?>')">Edit</button></td>
		</tr>
		<?php } ?>
	  </tbody>	
	</table>  
    </div>
  </div>
</div>

<h4>Terms & Conditions</h4>
<?php 
	$query=mysql_query("SELECT * FROM company")or die(mysql_error($connection));
	$arr=mysql_fetch_array($query);
		
?>
<div class="col-md-6">
	<textarea class="form-control" rows="6" name="txt_terms" id="txt_terms" placeholder="Terms" style="border: none;"><?php echo $arr['terms'];?></textarea>
</div>
	<div class="panel-body"></div>
	<textarea class="form-control" rows="4" name="txt_bank" id="txt_bank" placeholder="Company Bank Details." style="border: none;display:none;" ><?php echo $arr['bank_details'];?></textarea>

	<div class="panel-body"></div>

<div class="col-lg-12" align="right">
	<button name="product_submit" type="submit" class="btn btn-primary" style="display: none;">Delete</button>
	<button name="product_submit" type="submit" class="btn btn-primary" name="print_button" id="print_button" value="Print" onclick="PrintDiv();"><span class="glyphicon glyphicon-print"></span> Print</button>
	
	<button name="btn_save" type="submit" class="btn btn-primary" id="btn_save" value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
</div>
<?php require_once"print_purchase_order.php"; ?>
<div class="panel-body"></div>
</div>
<!-- <center><p id='msg'></p></center> -->
</form>	

 <!--Delete model start here-->
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Delete product</h4>
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

<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center">PO Form</h3>
            </div>
            <div class="modal-body">    
            <form  method="post" id="edit_myform" enctype="multipart/formdata"> 

                <input type="hidden" name="txt_id1" id="txt_id1" value="<?php echo $rec_id; ?>">
                <input type="text" name="record_id" id="record_id">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
				<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
                <div class="col-md-12">
	               <div class="col-md-6">
						<label>Date <span class="required_field">*</span></label>
						<input type="date" name="date" id="txt_date" class="form-control" data-placeholder="Date" required aria-required="true" readonly="" />
					</div>
					<div class="col-md-6">
					<label>Requisition Made By <span class="required_field">*</span></label>
						<select name="reqi_made_by" id="reqi_made_by" class="form-control" required="" readonly="">
						<option value="">Requisition Made by</option>
							<?php 
								if($utype=='admin'){
							 	$sq = mysql_query("SELECT * FROM user_profile")or die(mysql_error($connection));
								 }else{
								 	$sq = mysql_query("SELECT a.* FROM user_profile a INNER JOIN `project_team` f ON a.id=f.emp_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
								 }
								while($arr=mysql_fetch_array($sq))
								{
							?>
							<option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="panel-body"></div>
				<div class="col-md-12">
	               <div class="col-md-6">
					<label>Project Name <span class="required_field">*</span></label>
					<select name="sel_project" id="sel_project" class="form-control" required="" readonly="">
					<option value="">Select Project</option>
					<?php 
					if($utype=='admin'){
						$sq = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
					}else{
						$sq = mysql_query("SELECT a.* FROM new_project a INNER JOIN `project_team` f ON a.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
					}
						while($arr=mysql_fetch_array($sq))
						{
					?>
					<option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
					<?php }?>
					</select>
					</div>
					<div class="col-md-6">
					<label>Material Name <span class="required_field">*</span></label>
						<select name="material_name" id="material_name" class="form-control" required="" readonly="">
						<option value="">Select Material</option>
						<?php 
							$sq = mysql_query("SELECT * FROM mst_material")or die(mysql_error($connection));
							while($arr=mysql_fetch_array($sq))
							{
						?>
							<option value="<?php echo $arr['id']; ?>"><?php echo $arr['mat_name']; ?>(<?php echo $arr['brand_name']; ?>)</option>
						<?php } ?>
					</select>
					</div>
				</div>
				<div class="panel-body"></div>

				<div class="col-md-12">
	            <div class="col-md-6">
					<label>Description</label>
					<textarea class="form-control" name="txt_desc" id="txt_desc" placeholder="Description" readonly=""></textarea>
				</div>
				<div class="col-md-6">
					<label>Unit <span class="required_field">*</span></label>
					<select name="txt_unit" id="txt_unit" class="form-control" required="" readonly="">
						<option value="">Select Unit</option>
						<?php 
							$sq = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
							while($arr=mysql_fetch_array($sq))
							{
						?>
						<option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
						<?php } ?>
					</select>
				</div>
				</div>
				<div class="panel-body"></div>

				<div class="col-md-12">
		            <div class="col-md-6">
						<label>Quantity <span class="required_field">*</span></label>
						<input type="number" class="form-control" name="txt_qty" id="txt_qty" placeholder="Quantity" required="" onkeyup="taxoncalculation();" readonly="">
					</div>
					<div class="col-md-6">
						<label>Required By <span class="required_field">*</span></label>
						<input type="date" class="form-control" name="requried_by_date" id="requried_by_date" data-placeholder="Required By" required="" readonly="">
					</div>
				</div>
				<div class="panel-body"></div>

				<div class="col-md-12">
		            <div class="col-md-6">
						<label>Comment</label>
						<textarea class="form-control" name="txt_comment" id="txt_comment" placeholder="Comment" readonly=""></textarea>
					</div>
					<div class="col-md-6">
						<label>Approval <span class="required_field">*</span></label>
						<select class="form-control" name="approval" id="approval" required="" readonly="">
							<option value="">Select One</option>
							<option value="Approved">Approved</option>
							<option value="Pending">Pending</option>
							<option value="Declined">Declined</option>
						</select>
					</div>
				</div>
				<div class="panel-body"></div>
                <div class="col-md-12">
					<div class="col-md-6">
						<label>Rate <span class="required_field">*</span></label>
						<input type="number" class="form-control" name="txt_rate" id="txt_rate" placeholder="Rate" required="" onkeyup="taxoncalculation();" >
					</div>

					<div class="col-md-6">
				 		<div class="col-md-6"><label>Select Tax</label></div>
				 		<div class="col-md-6"><label>Total Amount</label></div>
						<div class="col-md-3">
						<button type="button" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="false" style="padding: 5px 9px;"> <span class="icon fa fa-caret-down"></span></button>
				          <ul class="dropdown-menu" role="menu">
				            <?php
								$temp=0;
								$recn=mysql_query("SELECT count(id) FROM tax WHERE active=1");
								$rowcn = mysql_fetch_array($recn);
								$count=$rowcn['count(id)'];
								$result=mysql_query("SELECT * FROM tax WHERE active=1");
								while($r = mysql_fetch_array($result))
							{ ?>
				            <li>
				              <div class="col-md-12" style="font-size:12px;">
				                <input type="radio" name="chk[]"  id="<?php echo "game".$temp++;?>" onClick="UpdateCost()" <?php echo $r["is_default"];?> value="<?php echo $r["value"];?>" onkeyup="taxoncalculation();"/>
				                <?php echo $r["name"];?> @ <?php echo $r["value"];?>%

				              </div>
				            </li>
				            <?php }?>
				          </ul><input type="hidden" name="taxcount" id="taxcount" value="<?php echo $count;?>">
				        </div>

				      <div class="col-md-3" >

				       <?php 
					  		$defqry=mysql_query("SELECT * FROM tax WHERE `is_default` = '1'");
							$defrow = mysql_fetch_array($defqry);
					     ?>
				        <input type="text" readonly name="select_tax" id="select_tax" placeholder="Tax Percentage" value="" maxlength="6" class="form-control" <?php if(!empty($defrow['value'])) { echo "readonly=\"readonly\""; } ?> onkeyup="taxoncalculation();" onkeypress="return onlyNos(event,this);" style="margin-left: -65px; width: 150px;"/>

				      </div>
				       <input type="hidden" class="form-control" name="tax_amt" id="tax_amt" placeholder="Tax Amount " onkeyup="taxoncalculation();">

				       <div class="col-md-3">
				        <input type="text" class="form-control" readonly name="txt_price" id="txt_price" placeholder="Total Amount" value="" style="width: 175px;">
				      </div>
					</div>
				</div>
               
               <div class="panel-body"></div>
           		 <p id="pmsg"></p>   
	            <div class="modal-footer">

	               <button class="btn btn-primary submit" name="submit" id="save" >Save</button >
	               <button type="button" class="btn btn-warning btn-md" data-dismiss="modal">Cancel</button>      
		        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
	function get_data(id){
		var id =id;
		$.ajax({
	                type:'POST',
	                url: "get_approval_detail_edit.php",
	                data:{
	                        id:id
	                },
	                dataType: "JSON",
	                success:function(data)
	                {
		                console.log(data);
		                	
		                // $('#txt_id1').val(data.id);
		                $('#record_id').val(data.rec_mat_id);
	               		$('#reqi_made_by').val(data.requ_made_by);
	                	$('#txt_date').val(data.date);
	                	$('#sel_project').val(data.pro_id);
	                	$('#material_name').val(data.mate_id);
	                	$('#txt_desc').val(data.description);
	                	$('#txt_unit').val(data.unit);
	                	$('#txt_qty').val(data.qty);
	                	$('#requried_by_date').val(data.requried_by_date);
	                	$('#txt_comment').val(data.comment);
	                	$('#approval').val(data.approval);
	                	$('#txt_rate').val(data.mat_rate);
	                	$('#txt_price').val(data.total_amt);
	                	$('#select_tax').val(data.mat_tax);
	                	
	                }
	            });

	}
</script>

<!-- Select state and state code -->

<script>
	function state(){

	    var txt_product = document.getElementById("txt_state").value;
	    $("#txt_state").autocomplete({
	        source: 'select_state.php',
	        select: function(a,b)
		        {
		            $(this).val(b.item.value); //grabed the selected value
		            get_state_code(b.item.value);//passed that selected value
		        }
	    });
	}
		function get_state_code(name){
		 $.ajax({
                     url:'get_state_code.php',
                     type:'POST',
                     data:{
                            name:name
                     },
                     success: function(data)
                     {
                       var obj = $.parseJSON(data);
                        $('#txt_state').val(obj.name);
                        $('#txt_code').val(obj.state_code);
                        
                        if(data==1)
                        {
                            alert("update");
                        }
                     } 
            });
		}

		function state_ship(){

	    var txt_product = document.getElementById("txt_sstate").value;
	    $("#txt_sstate").autocomplete({
	        source: 'select_state.php',
	        select: function(a,b)
		        {
		            $(this).val(b.item.value); //grabed the selected value
		            get_bstate_code(b.item.value);//passed that selected value
		        }
	    });
	}
		function get_bstate_code(name){
		 $.ajax({
                     url:'get_state_code.php',
                     type:'POST',
                     data:{
                            name:name
                     },
                     success: function(data)
                     {
                       var obj = $.parseJSON(data);
                        $('#txt_sstate').val(obj.name);
                        $('#txt_scode').val(obj.state_code);
                        
                        if(data==1)
                        {
                            alert("update");
                        }
                     } 
            });
		}

</script>

<script>
function isNumber(evt) {   
     evt = (evt) ? evt : window.event;        
     var charCode = (evt.which) ? evt.which : evt.keyCode;     
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {     
               alert("Please enter only Numbers.");          
                 return false;      
                   }       
                    return true;  
                      }
</script>
<!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
<script>
function PrintDiv()
{    
	var divToPrint = document.getElementById('divToPrint');
	var popupWin = window.open('', '_blank', 'width=800,height=620');

	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
}
</script>

<script type="text/javascript">
// This function is used for product suggesions and fetch values
 function auto(){

    var txt_product = document.getElementById("txt_product").value;
    $("#txt_product").autocomplete({
        source: 'autocomplete.php',
        select: function(a,b)
	        {
	            $(this).val(b.item.value); //grabed the selected value
	            getProductsOtherInfo(b.item.value);//passed that selected value
	        }
    });
}

function getProductsOtherInfo(name){
        $.ajax({
                     url:'get_product.php',
                     type:'POST',
                     data:{
                            name:name
                     },
                     success: function(data)
                     {
                       var obj = $.parseJSON(data);
                        $('#txt_product').val(obj.reference);
                        $('#txt_desc').val(obj.description);
                        $('#txt_cost').val(obj.base_price);
                       	$('#txt_hsn_no').val(obj.hsn_code);
                        if(data==1)
                        {
                            alert("update");
                        }
                     } 
            });
    }

// This function is used for customer suggesions and fetch values
//  function supp(){

//     var txt_cname = document.getElementById("txt_cname").value;
//     $("#txt_cname").autocomplete({
//         source: 'supp_autocomplete.php', 
//         select: function(a,b)
// 	        {
// 	            $(this).val(b.item.value); //grabed the selected value
// 	            getCustOtherInfo(b.item.value);//passed that selected value
// 	        }
//     });
// }

// function getCustOtherInfo(name){
//         $.ajax({
//                      url:'get_supplier.php',
//                      type:'POST',
//                      data:{
//                             name:name
//                      },

//                      success: function(data)
//                      {
//                        var obj = $.parseJSON(data);
//                         $('#txt_cname').val(obj.name);
//                         $('#txt_cleagal_id').val(obj.panno);
//                         $('#txt_cemail').val(obj.email);
//                         $('#supp_comp').val(obj.comp_name);
//                         $('#txt_iaddr').val(obj.address);
//                         $('#txt_gstno').val(obj.gst_no);
//                         $('#txt_state').val(obj.state_name);
//                         $('#txt_code').val(obj.state_code);
//                         $('#txt_city').val(obj.ct_name); 
                        
//                         if(data==1)
//                         {
//                             alert("update");
//                         }
//                      } 
//             });
//     }

$('#supplier_name').change(function(e){
	var name = $(this).val();
	// alert(id); 

	 $.ajax({
             url:'get_supplier.php',
             type:'POST',
             data:{
                    name:name
             },

             success: function(data)
             {
               var obj = $.parseJSON(data);
                // $('#txt_cname').val(obj.name);
                $('#supp_pan').val(obj.panno);
                $('#txt_cemail').val(obj.email);
                $('#supp_comp').val(obj.comp_name);
                $('#txt_iaddr').val(obj.address);
                $('#txt_gstno').val(obj.gst_no);
                $('#txt_state').val(obj.state_name);
                $('#txt_code').val(obj.state_code);
                $('#txt_city').val(obj.ct_name); 
                
                if(data==1)
                {
                    alert("update");
                }
             } 
        });

})


</script>


<!-- Insert Script -->
<script>

$('form#myform').submit(function(e){

     e.preventDefault();
	if(document.pressed == 'save')
	{
		$("button#btn_save").button('loading');
		$.ajax({
					data:$("#myform").serialize(),
					type:"POST",
					url:'update_purchase_order.php',
					success: function(data)
					{
						$("button#btn_save").button('reset');
						if(data==3)
						{
							swal({
								  	position: 'top-right',
								    type: 'success',
									title: 'Save Successfully!!!',
									showConfirmButton: false,
									timer: 1500
							  })
						 	window.setTimeout(function()
						    { 
						      window.location.href= "dashboard.php?page=edit_purchase_invoice&id=<?php echo $rec_id;?>";
						 	} ,1500);
						}
						else if(data==2)
						{
							alert('Error....');
							return false;
						} 
					}
			   });
		}

});

$('form#edit_myform').submit(function(e){

     e.preventDefault();
	
	$("button#btn_save").button('loading');
	$.ajax({
				data:$("#edit_myform").serialize(),
				type:"POST",
				url:'update_purchase_material.php',
				success: function(data)
				{
					$("button#btn_save").button('reset');
					if(data==3)
					{
						swal({
							  	position: 'top-right',
							    type: 'success',
								title: 'Save Successfully!!!',
								showConfirmButton: false,
								timer: 1500
						  })
						 window.setTimeout(function()
					    { 
					      // window.location.href= "dashboard.php?page=new_purchase_invoice&id=<?php echo $rec_id;?>";
					      $('#myModal').modal('hide');
					 	} ,1500);
					}
					else if(data==2)
					{
						alert('Error....');
						return false;
					} 
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
                            url:'delete_purchase_product.php',
                            type: "POST",
                            data: {
                                   id:id  
                            },
                            success: function(data)
                                {
                                  //alert(data);
                                    if(data==1)
                                    {
                                        $("#products").load(" #products");
			             		    	$("#deleteModal").load(" #deleteModal");
			             		    	$("#bill").load(" #bill");
                                    }                          
                                }
                        });
        })
</script>

<script>

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

	var amt = document.getElementById('txt_rate').value;
	var tax = document.getElementById('select_tax').value;
    var qut = document.getElementById('txt_qty').value;

    // To calculate totalcost of products 
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	
	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);

   if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_price').value = parseFloat(totaltax).toFixed(2);
    }
    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_price').value = parseFloat(totalcost).toFixed(2);
    }
		// if(!isNaN(per)){

		//  document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		// }else{
			document.getElementById('tax_amt').value = parseFloat(per1).toFixed(2);
		// }

} 

/*calculation*/
onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var amt = document.getElementById('txt_rate').value;
	var tax = document.getElementById('select_tax').value;
    var qut = document.getElementById('txt_qty').value;	

    // To calculate totalcost of products 
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 

	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);
	
   if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_price').value = parseFloat(totaltax).toFixed(2);
    }

    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_price').value = parseFloat(totalcost).toFixed(2);
    }
    
		// document.getElementById('disc_amt').value = parseFloat(disc_amt).toFixed(2);
		

		// if(!isNaN(per)){

		//  document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		// }else{
			document.getElementById('tax_amt').value = parseFloat(per1).toFixed(2);
		// }

}

</script>
