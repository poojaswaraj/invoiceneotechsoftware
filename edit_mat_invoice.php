<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
 if(isset($_GET["id"]))
    {
             $id = $_GET["id"];

     $query = mysql_query("SELECT a.id,b.challan_no,c.name,a.* FROM `common`a inner join material_invoice_gen b on a.number=b.number inner join mst_supplier c on c.id=a.customer_name where customer_name=$id")or die(mysql_error($connection));
       		$data=mysql_fetch_array($query);
       			     	 $challan_no = $data['challan_no'];
       			     	  	$company_id = $data['id'];
       			 	  $name = $data['name'];
              $po_no = $data['po_no'];
                            $po_date = $data['po_date'];
       			   $chall=explode(',',$challan_no);
					   foreach($chall as $cha)
					   {
					     	     $cha;
					   }

    }
	 $query1 = mysql_query("Select b.name,ct_name,a.* from mst_supplier a inner join tbl_states b on a.state=b.id inner join city c on c.ct_id=a.city where a.id=$id")or die(mysql_error($connection));
	$data1=mysql_fetch_array($query1);

$txt_sname = $data1['name'];
$supp_pan = $data1['panno'];
$txt_gstno = $data1['gst_no'];
$supp_comp = $data1['comp_name'];
$txt_cemail = $data1['email'];
  $txt_state = $data1['name'];
  $txt_code = $data1['state'];
 $txt_city = $data1['ct_name'];
 $txt_iaddr = $data1['address'];


	
?>
<form id="myform" name="frm_purchase" autocomplete="off" method="POST" >
<div class="row">
<h3>Edit Invoice&nbsp;-&nbsp;<?php echo $data['name']; ?></h3><hr>
<!-- <form id="myform" name="frm_purchase" autocomplete="off" action="code.php" method="POST"> -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
<input type="hidden" name="data" id="data" value="<?php echo $company_id;?>">

<div class="col-lg-9">
	<div class="col-md-6">
		<label>Supplier Name  <span class="required_field">*</span></label>
		<input type="text" class="form-control" name="txt_sname" id="txt_sname" placeholder="Supplier Name" style="text-transform:capitalize;"  onkeyup="supp();" required="" value="<?php echo $txt_sname;?>">
		<!-- <select name="supplier_name" id="supplier_name" class="form-control" required="">
			<option value="">Select Supplier</option>
			<?php 
				$sq = mysql_query("SELECT * FROM mst_supplier")or die(mysql_error($connection));
				while($arr=mysql_fetch_array($sq))
				{
			?>
			<option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
		<?php }?>
	</select> -->
	</div>
	<div class="col-md-3">
		<label>Supplier PAN No</label>
		<input type="text" class="form-control" name="supp_pan" id="supp_pan" placeholder="Supplier PAN No."  value="<?php echo $supp_pan;?>" >
	</div>
	<div class="col-md-3">
		<label>Supplier GST No</label>
		<input type="text" class="form-control" name="txt_gstno" id="txt_gstno" placeholder="Supplier GST No" value="<?php echo $txt_gstno;?>" >
	</div>
	<div class="panel-body"></div>
	
	<div class="col-md-12">
		<div class="col-md-6">
			<label>Company Name </label>
			<input type="text" class="form-control" name="supp_comp" id="supp_comp" placeholder="Company Name" value="<?php echo $supp_comp;?>" >
		</div>

		<div class="col-md-6">
			<label>Supplier Email <span class="required_field">*</span></label>
			<input type="email" class="form-control" name="txt_cemail" id="txt_cemail" placeholder="Supplier Email" required="" value="<?php echo $txt_cemail;?>" >
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6">
			<label>State <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_state" id="txt_state" placeholder="State" onkeyup="state()" value="<?php echo $txt_state;?>" >
		</div>

		<div class="col-md-6">
			<label>State Code</label>
			<input type="text" class="form-control" name="txt_code" id="txt_code" placeholder="State Code" value="<?php echo $txt_code;?>">
		</div>
	</div>
	<div class="panel-body"></div>

	<div class="col-md-6">
		<label>City <span class="required_field">*</span></label>
		<input type="text" class="form-control" name="txt_city" id="txt_city" placeholder="State Code" value="<?php echo $txt_city;?>">
	</div>
	<div class="col-md-6">
		<label>Address <span class="required_field">*</span></label>
		<textarea class="form-control" name="txt_iaddr" id="txt_iaddr" placeholder=" Address" required="" ><?php echo $txt_iaddr;?></textarea>
	</div>
<div class="col-lg-12">
	<!-- <div class="col-md-1">
		<label>Series</label>
	</div> -->
	<div class="col-md-3">
	<label>Series <span class="required_field">*</span></label>

		<select class="form-control" name="select_series" id="select_series" required="">
			<option value="">Select Series</option>
			<?php 
			if($utype=='admin')
			{
				$query = mysql_query("SELECT * FROM series WHERE user_id='$user_id'");
			}
			else
			{
				$query = mysql_query("SELECT * FROM series WHERE user_id='$sub_id'");
			}
				while($row=mysql_fetch_array($query))
				{
			?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
			<?php
				}
			?>

		</select>
	</div>
	
	<div class="col-md-3">
	<label>Current Series No</label>
		<input type="text" class="form-control" name="ser_no" id="ser_no" readonly="" placeholder="Current Series No"> 
	</div>
	<div class="col-md-3">
	<label>Issue Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="idate" id="idate" required="">
	</div>
	<div class="col-md-3">
	<label>Due Date</label>
		<input type="date" class="form-control" name="ddate" id="ddate">
	</div>
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
		<input type="text" class="form-control" name="po_no" id="po_no" placeholder="PO/WO No" required=""  value="<?php echo $po_no;?>">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-12">
		<label>PO Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="po_date" id="po_date" data-placeholder="PO Date" required="" value="<?php echo $po_date;?>">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-12">
		<label>Project <span class="required_field">*</span></label>
		<select name="sel_pro" id="sel_pro" class="form-control">
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
			<?php } ?>
		</select>
	</div>

</div>

<div class="panel-body"></div>
	
<div class="panel-body"></div>

<div class="col-lg-12" id="products">
  <div class="panel panel-default">
    <div style="height: 200px; overflow-y: scroll; overflow-x: hidden;">
      <table>
	  <thead>
		<tr>
		  <th>challan no</th>
		  <th>Description</th>
		  <th>Rate</th>
		   <th>Unit</th>
		  	<th>Qty</th>
		  	<th>Amount</th>
		  <th>Taxes</th>
		 <th>Taxes Rate</th>
		  <th>Total amount</th>
		 </tr>
	  </thead>
	  <tbody>
	  <?php
	    	$sq = mysql_query("SELECT * FROM material_procurement where id in ($challan_no)")or die(mysql_error($connection));

		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$id=$row['id'];
		  		$tax = $row['tax_amt'];
		  		$a=$tax/2; // Divide tax into SGST and CGST
	  ?>
		<tr>
			<td><?php echo $row['challan'];?></td>
			<td><?php echo $row['description'];?></td>
		 <td><?php echo $row['rate'];?></td> 
		  <td><?php echo $row['unit'];?></td> 
		 	<td><?php echo $row['qty'];?></td> 
		 		<td><?php echo $row['amount'];?></td> 
		 	<td><?php echo $row['tax_value'];?></td> 
		 		<td><?php echo $row['tax_amt'];?></td> 
		 	<td><?php echo $row['total_amt'];?></td> 
			</tr>
		<?php } ?>
	  </tbody>	
	</table>  
    </div>
  </div>
</div>
<div class="col-md-12" id="bill">

<?php
	
	$sum = mysql_query("SELECT SUM(qty * rate) AS base,  SUM(tax_amt) as 'Total_tax',sum(total_amt)as total_amt FROM material_procurement  WHERE id IN ($challan_no)")or die(mysql_error($connection));
	while($arr=mysql_fetch_array($sum))
	{
		$base= $arr['total_amt'];
	 	 $tax_amt = $arr['Total_tax'];
         $total_amt = $base + $tax_amt;
?>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Base Amt</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_base" id="txt_base" value="<?php echo $arr['base'];?>" placeholder="Base Amt" readonly>
	</div>
	<div class="panel-body" ></div>
	<div class="col-md-9"></div>
	
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Taxes Amt</label>
	</div>
	<div class="col-md-2">

		<input type="text" class="form-control" name="txt_total_tax" id="txt_total_tax" value="<?php echo $arr['Total_tax'];?>" placeholder="Taxes Amt" readonly>

	</div>
	<div class="panel-body"></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Total Amt</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_total" id="txt_total" value="<?php echo $total= $arr['base']+$arr['Total_tax'];?>" placeholder="Total Amt" readonly>

		<div id="word">
   			<!-- <textarea class="form-control" name="word" id="word" style="display: none;"></textarea> -->
		</div>
	</div>
	<?php } ?>
</div>
<h4>Terms & Conditions</h4>
<?php 
	$query=mysql_query("SELECT * FROM company")or die(mysql_error($connection));
	$arr=mysql_fetch_array($query);
		
?>
<div class="col-md-6">
	<textarea class="form-control" rows="4" name="txt_terms" id="txt_terms" placeholder="Terms" style="border: none;"><?php echo $arr['terms'];?></textarea>
</div>
<div class="panel-body"></div>
	<textarea class="form-control" rows="4" name="txt_bank" id="txt_bank" placeholder="Company Bank Details." style="border: none;display:none;" ><?php echo $arr['bank_details'];?></textarea>

<div class="panel-body"></div>
	<div class="col-lg-12" align="right">
<button name="product_submit" type="submit" class="btn btn-primary" name="print_button" id="print_button" value="Print" onclick="PrintDiv();"><span class="glyphicon glyphicon-print"></span> Print</button>
		<button name="btn_save" type="submit" class="btn btn-primary" id="btn_save" value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>

<?php
require_once"print_mat_invoice.php";
?>	</div>

<div class="panel-body"></div>
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
                <h3 class="modal-title" align="center">Material Details</h3>
            </div>
            <div class="modal-body">    
            <form  method="post" id="edit_myform" enctype="multipart/formdata"> 

                <input type="hidden" name="txt_id1" id="txt_id1">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
				<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
              	<input type="hidden" name="record_id" id="record_id" value="<?php echo $rec_id; ?>"> 

				<div class="col-md-12">
					<div class="col-md-6">
					<label>Material Name <span class="required_field">*</span></label>
						<select name="material_names" id="mate_name" class="form-control" required="">
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
				
					<div class="col-md-6">
						<label>Description</label>
						<textarea class="form-control" name="txt_descs" id="txt_des" placeholder="Description"  readonly=""></textarea>
					</div>
				</div>
				<div class="panel-body"></div>

				<div class="col-md-12">
	            
				<div class="col-md-6">
					<label>Unit <span class="required_field">*</span></label>
					<select name="txt_units" id="txt_units" class="form-control" required="">
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
				<div class="col-md-6">
					<label>Quantity <span class="required_field">*</span></label>
					<input type="number" class="form-control" name="txt_qtys" id="txt_qtys" placeholder="Quantity" required="" onkeyup="taxoncalculations();">
				</div>
				</div>
				
				<div class="panel-body"></div>
                <div class="col-md-12">
					<div class="col-md-6">
						<label>Rate <span class="required_field">*</span></label>
						<input type="text" class="form-control" name="txt_rates" id="txt_rates" placeholder="Rate" required="" onkeyup="taxoncalculations();">
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
				                <input type="radio" name="chk[]"  id="<?php echo "games".$temp++;?>" onClick="UpdateCosts()" <?php echo $r["is_default"];?> value="<?php echo $r["value"];?>" onkeyup="taxoncalculations();"/>
				                <?php echo $r["name"];?> @ <?php echo $r["value"];?>%

				              </div>
				            </li>
				            <?php }?>
				          </ul><input type="hidden" name="taxcount" id="taxcounts" value="<?php echo $count;?>">
				        </div>

				      <div class="col-md-3" >

				       <?php 
					  		$defqry=mysql_query("SELECT * FROM tax WHERE `is_default` = '1'");
							$defrow = mysql_fetch_array($defqry);
					     ?>
				        <input type="text" readonly name="select_taxs" id="select_taxs" placeholder="Tax Percentage" value="" maxlength="6" class="form-control" <?php if(!empty($defrow['value'])) { echo "readonly=\"readonly\""; } ?> onkeyup="taxoncalculations();" onkeypress="return onlyNos(event,this);" style="margin-left: -65px; width: 150px;"/>

				      </div>
				       <input type="hidden" class="form-control" name="tax_amts" id="tax_amts" placeholder="Tax Amount " onkeyup="taxoncalculations();">

				       <div class="col-md-3">
				        <input type="text" class="form-control" readonly name="txt_prices" id="txt_prices" placeholder="Total Amount" value="" style="width: 175px;">
				      </div>
					</div>
				</div>
               <div class="panel-body"></div>

				<div class="col-md-12">
		            <div class="col-md-6">
						<label>Comment</label>
						<textarea class="form-control" name="txt_comments" id="txt_comments" placeholder="Comment"></textarea>
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
 
$(document).ready(function(){
    $('#select_series').on('change',function(){
        var id = $(this).val();

      if(id)
        {
          $.ajax({
                    type:'POST',
                    url: "get_series_no.php",
                    data:{
                            id:id
                    },
                    dataType: "JSON",
                    success:function(data)
                    {
                      $('#ser_no').val(data.first_number);
                      
                    }
                }); 
          }else{
              $('#select_series').html('Select Series first'); 
          }
      });
});

</script>
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

                    	$('#txt_qty').val('');
                    	$('#txt_price').val('');
                    	
                    }
                }); 
          }else{
              $('#material_name').html('Select Material first'); 
          }
      });
});

</script>

<script>
function get_data(id){
	var id =id;
	alert(id);
	$.ajax({
                type:'POST',
                url: "get_po_onlymaterial.php",
                data:{
                        id:id
                },
                dataType: "JSON",
                success:function(data)
                {
	                console.log(data);
	                	
	                $('#txt_id1').val(data.id);
                	$('#mate_name').val(data.mate_id);
                	$('#txt_des').val(data.description);
                	$('#txt_units').val(data.unit);
                	$('#txt_qtys').val(data.qty);
                	$('#txt_comments').val(data.comment);
                	$('#txt_rates').val(data.rate);
                	$('#txt_prices').val(data.total_amt);
                	$('#select_taxs').val(data.tax_value);
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
                 $('#supp_comp').val(obj.comp_name);
                if(data==1)
                {
                    alert("update");
                }
             } 
        });

})


</script>
<script>
function PrintDiv()
{    
	var divToPrint = document.getElementById('divToPrint');
	var popupWin = window.open('', '_blank', 'width=800,height=620');

	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
}

function PrintDiv1()
{    
	var divToPrint = document.getElementById('divToPrint1');
	var popupWin = window.open('', '_blank', 'width=800,height=620');

	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint1.innerHTML + '</html>');
	popupWin.document.close();
}
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
					url:'update_mat_invoice.php',
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
						      window.location.href= "dashboard.php?page=material_invoices";
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
				url:'update_mat_invoice.php',
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
					      location.reload();
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

//script for update the material info

function UpdateCosts() {
  var sum = 0;
  var gn, elem;
  var a = document.getElementById('taxcounts').value;
  for (i=0; i<a; i++) {
    gn = 'games'+i;
    elem = document.getElementById(gn);
    if (elem.checked == true) { sum += Number(elem.value); }
  }
 	 document.getElementById('select_taxs').value = sum.toFixed(2);

	var amt = document.getElementById('txt_rates').value;
	var tax = document.getElementById('select_taxs').value;
    var qut = document.getElementById('txt_qtys').value;

    // To calculate totalcost of products 
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	
	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);

   if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_prices').value = parseFloat(totaltax).toFixed(2);
    }
    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_prices').value = parseFloat(totalcost).toFixed(2);
    }
		// if(!isNaN(per)){

		//  document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		// }else{
			document.getElementById('tax_amts').value = parseFloat(per1).toFixed(2);
		// }

} 

/*calculation*/
onkeyup="taxoncalculations()"
function taxoncalculations()
{	
	var amt = document.getElementById('txt_rates').value;
	var tax = document.getElementById('select_taxs').value;
    var qut = document.getElementById('txt_qtys').value;	

    // To calculate totalcost of products 
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 

	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);
	
   if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_prices').value = parseFloat(totaltax).toFixed(2);
    }

    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_prices').value = parseFloat(totalcost).toFixed(2);
    }
    
		// document.getElementById('disc_amt').value = parseFloat(disc_amt).toFixed(2);
		

		// if(!isNaN(per)){

		//  document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		// }else{
			document.getElementById('tax_amts').value = parseFloat(per1).toFixed(2);
		// }

}

</script>
