<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type'];
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
?>
<form id="myform" name="frm_purchase" autocomplete="off" method="POST" >
<div class="row">
<h3>New Estimate</h3><hr>

<h4>Client Info</h4>

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
<div class="col-lg-9">
	<div class="col-md-6">
	<label>Client Name <span class="required_field">*</span></label>
		<input type="text" class="form-control" name="txt_cname" id="txt_cname" placeholder="Client Name" style="text-transform:capitalize;" onkeyup="cust();" required=""> 	
	</div>
	<div class="col-md-3">
	<label>Client PAN No</label>
		<input type="text" class="form-control" name="txt_cleagal_id" id="txt_cleagal_id" placeholder="Client PAN No.">
	</div>
	<div class="col-md-3">
	<label>Client GST No</label>
		<input type="text" class="form-control" name="txt_gstno" id="txt_gstno" placeholder="Client GST No">
	</div>
	<div class="panel-body"></div>
	<!-- <div class="col-md-6">
		<input type="text" class="form-control" name="txt_cperson" id="txt_cperson" placeholder="Contact Person">
	</div>
	<div class="col-md-6">
		<input type="text" class="form-control" name="txt_cemail" id="txt_cemail" placeholder="Client Email Address">
	</div>
	<div class="panel-body"></div> -->
	<div class="col-md-6">
		<h5 style="text-align: center;"><label>Details of Recipient (Billed To)</label></h5>

		<div class="col-md-6">
		<label>Contact Person <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_cperson" id="txt_cperson" placeholder="Contact Person" required="" >
		</div>

		<div class="col-md-6">
		<label>Client Email <span class="required_field">*</span></label>
			<input type="email" class="form-control" name="txt_cemail" id="txt_cemail" placeholder="Client Email" required="">
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6">
		<label>State <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_state" id="txt_state" placeholder="State" onkeyup="state()" required=""> 
		</div>

		<div class="col-md-6">
		<label>State Code</label>
			<input type="text" class="form-control" name="txt_code" id="txt_code" placeholder="State Code" readonly="">
		</div>

	</div>

	<div class="col-md-6">
		<h5 style="text-align: center;"><label>Details of Consignee (Shipped To)</label></h5>

		<div class="col-md-6">
		<label>Contact Person</label>
			<input type="text" class="form-control" name="txt_scperson" id="txt_scperson" placeholder="Contact Person">
		</div>

		<div class="col-md-6">
		<label>Client Email</label>
			<input type="email" class="form-control" name="txt_scemail" id="txt_scemail" placeholder="Client Email Address">
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6"> 
		<label>State</label>
			<input type="text" class="form-control" name="txt_sstate" id="txt_sstate" placeholder="State" onkeyup="state_ship();">
		</div>

		<div class="col-md-6">
		<label>State Code</label>
			<input type="text" class="form-control" name="txt_scode" id="txt_scode" placeholder="State Code">
		</div>

	</div>
	<div class="panel-body"></div>


	<div class="col-md-6">
	<label>Invoice Address <span class="required_field">*</span></label>
		<textarea class="form-control" name="txt_iaddr" id="txt_iaddr" placeholder="Invoice Address" required=""></textarea>
	</div>
	<div class="col-md-6">
	<label>Shipping Address</label>
		<textarea class="form-control" name="txt_saddr" id="txt_saddr" placeholder="Shipping Address"></textarea>
	</div>
<div class="col-md-12">
	<label>Same Shipping Address</label>
		<input type="checkbox" name="shifttoo" id="shifttoo" onclick="FillBilling(this.form)">
	
	</div>
<script>
	function FillBilling(f) {
	  if(f.shifttoo.checked == true) {
	    f.txt_scperson.value = f.txt_cperson.value;
	    f.txt_scemail.value = f.txt_cemail.value;
	    f.txt_sstate.value = f.txt_state.value;
	    f.txt_scode.value = f.txt_code.value;
	    f.txt_saddr.value = f.txt_iaddr.value;
	  }
	}

</script>

</div>
<div class="col-lg-3">
<div class="panel-body"></div><br>
	<!-- <div class="col-md-12">
		<h5 style="text-align: center;"><label>Purchase Order Details</label></h5>
	</div>
	<div class="col-md-12">
		<input type="text" class="form-control" name="po_no" id="po_no" placeholder="PO/WO No">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-12">
	<input type="date" class="form-control" name="po_date" id="po_date" placeholder="PO Date">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-12">
		<input type="text" class="form-control" name="proj_name" id="proj_name" placeholder="Project Name">
	</div> -->
</div>
<div class="panel-body"></div>

<div class="col-lg-12">
<!-- 	<div class="col-md-1">
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
	<div class="col-md-2">
	<label>Current Series No</label>
		<input type="text" class="form-control" name="ser_no" id="ser_no" readonly=""> 
	</div>

	<div class="col-md-2">
	<label>Issue Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="idate" id="idate" required="">
	</div>
	<!-- <div class="col-md-1">
		<label>Due Date</label>
	</div>
	<div class="col-md-3">
		<input type="date" class="form-control" name="ddate" >
	</div> -->
</div>
<div class="panel-body"></div>

<div class="col-lg-12" id="pro">
	
	<input type="hidden" name="txt_session" id="txt_session" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
	<input type="hidden" name="users_id" value="<?php echo $user_id; ?>">

	<div class="col-md-2">
	<label>Product</label>
	 <input type="text" class="form-control" name="txt_product" id="txt_product" placeholder="Product" onkeyup="auto();">
	</div>
	<div class="col-md-1">
	<label>HSN/SAC</label>
		<input type="text" class="form-control" name="txt_hsn_no" id="txt_hsn_no" placeholder="HSN/SAC">
	</div>
	<div class="col-md-2">
	<label>Description</label>
		<input type="text" class="form-control" name="txt_desc" id="txt_desc" placeholder="Description">
	</div>
	<div class="col-md-1">
	<label>Unit Cost</label>
		<input type="text" class="form-control" name="txt_cost" id="txt_cost" placeholder="Unit Cost" onkeyup="taxoncalculation();" value="">
		
	</div>
	<div class="col-md-1">
	<label>Quantity</label>
		<input type="text" class="form-control" name="txt_qty" id="txt_qty" placeholder="Qty" onkeypress="return isNumber(event)" onkeyup="taxoncalculation();" value="">
		<p id="msg"></p>
	</div>
	
	<div class="btn-group col-md-1">
	<div class="col-md-12"><label>Select Tax</label></div>
		<button type="button" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="false" style="
    padding: 5% 10%;"> <span class="icon fa fa-caret-down"></span></button>
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

      <div class="btn-group col-md-1" >
       <div class="col-md-12" style="margin: 12px;"></div>
       <?php 
	  		$defqry=mysql_query("SELECT * FROM tax WHERE `is_default` = '1'");
			$defrow = mysql_fetch_array($defqry);
	     ?>
        <input type="text" readonly name="select_tax" id="select_tax" placeholder="Tax Percentage" value="" maxlength="6" class="form-control" <?php if(!empty($defrow['value'])) { echo "readonly=\"readonly\""; } ?> onkeyup="taxoncalculation();" onkeypress="return onlyNos(event,this);" style="margin-left: -65%; width: 145%;"/>

        <input type="hidden" class="form-control" name="tax_amt" id="tax_amt" placeholder="Tax Amount " onkeyup="taxoncalculation();">

      </div>

	<div class="col-md-1">
	<label>Discount</label>
		<input type="text" class="form-control" name="txt_discount" id="txt_discount" placeholder="Dis(%)"  onkeyup="taxoncalculation();">

		<input type="hidden" class="form-control" name="disc_amt" id="disc_amt" placeholder="Discount Amount "  onkeyup="taxoncalculation();">

	</div>
	<div class="col-md-2">
	<label>Price</label>
		<input type="text" class="form-control" name="txt_price" id="txt_price" placeholder="Price" readonly="" >

	</div>
	<div class="panel-body"></div>
	
	<div class="col-md-12" align="right">
		<button type="submit" class="btn btn-primary" name="product_submit1" id="product_submit1" value="add_item" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Add Item</button>

	</div>
	<center><p id='pmsg'></p></center>
	<div class="panel-body"></div>

</div>

<div class="col-lg-12" id="products">
  <div class="panel panel-default">
    <div style="height: 200px; overflow-y: scroll; overflow-x: hidden;">
      <table>

	  <thead>
		<tr>
		  <th>Product</th>
		  <th>Description</th>
		  <th>HSN/SAC</th>
		  <th>Unit Cost</th>
		  <th>Qty</th>
		  <th>Taxes</th>
		  <th>Discount</th>
		  <th>Price</th>
		  <th>Delete</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
	  	 $sess=$_SESSION['SESS_MEMBER_ID'];
	  	$sq = mysql_query("SELECT b.reference,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id WHERE  a.session='$sess'")or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$id=$row['id'];
		  		 $tax = $row['tax_amt'];
		  		 $a=$tax/2; // Divide tax into SGST and CGST
	  ?>
		<tr>
			<td><?php echo $row['reference'];?></td>
			<td><?php echo $row['description'];?></td>
			<td><?php echo $row['hsn_code'];?></td>
			<td>Rs.<?php echo $row['unitary_cost'];?></td>
			<td><?php echo $row['quantity'];?></td>

			<!-- <td><?php echo $a;?></td> -->
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

					$sel=mysql_query("SELECT b.sgst,b.cgst,b.igst,b.value,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value  where a.item_id=$id");
					while($arr=mysql_fetch_array($sel))
						{
							// echo "<br>".$arr['sgst'];echo "&nbsp;-&nbsp;Rs.".$a; echo "<br>".$arr['cgst'];echo "&nbsp;-&nbsp;Rs.".$a;
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
			<td><?php echo $row['discount'];?>%</td>
			<td>Rs.<?php echo $row['price'];?></td>
			<td> 
				<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span>
				</button>
		    </td>
		</tr>
		<?php
			}
		?>
	  </tbody>	
	</table>  
    </div>
  </div>
</div>

<div class="col-md-12" id="bill">
<!-- <div class="col-md-4 col-md-offset-8" id="bill"> -->

<?php 
	$sum = mysql_query("SELECT SUM(unitary_cost * quantity) AS base, SUM(disc_amt) as 'Total_dis', SUM(tax_amt) as 'Total_tax', SUM(a.price) as 'Total_price' FROM item a INNER JOIN product b ON a.product_id=b.id where a.session='$sess'")or die(mysql_error($connection));
	while($arr=mysql_fetch_array($sum))
	{
		$base=$arr['base'];
		$discount =$arr['Total_dis'];

		$Subtotal =$base-$discount;
		$txt_total=round($arr['Total_price']);
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
	<div class="col-md-1">
		<label>Discount Amt</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_total_discount" id="txt_total_discount" value="<?php echo $arr['Total_dis'];?>" placeholder="Discount Amt" readonly>
	</div>
	<div class="panel-body"></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Subtotal Amt</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_subtotal" id="txt_subtotal" value="<?php echo $Subtotal;?>"  placeholder="Subtotal Amt" readonly>
	</div>
	<div class="panel-body"></div>
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
		<input type="text" class="form-control" name="txt_total" id="txt_total" value="<?php echo $txt_total;?>" placeholder="Total Amt" readonly>
		<div id="word">	 
   			<!-- <textarea class="form-control" name="word" id="word" style="display: none;" ></textarea> -->
		</div>
	</div>
	<?php } ?>
</div>

<h4>Terms & Conditions</h4>
<?php 
	if($utype=='admin')
{
	$query=mysql_query("SELECT * FROM company WHERE user_id='$user_id'")or die(mysql_error($connection));
}
else{
	$query=mysql_query("SELECT * FROM company WHERE user_id='$sub_id'")or die(mysql_error($connection));
}
	$arr=mysql_fetch_array($query);
		
?>
<div class="col-md-6">
	<textarea class="form-control" name="txt_terms" id="txt_terms" rows="4" placeholder="Terms" style="border: none;" readonly=""><?php echo $arr['terms'];?></textarea>
</div>
<div class="panel-body"></div>

<h4>Bank Details</h4>
<div class="col-md-6">
	<textarea class="form-control" rows="4" name="txt_bank" id="txt_bank" placeholder="Company Bank Details." style="border: none;" readonly=""><?php echo $arr['bank_details'];?></textarea>
</div>
<div class="panel-body"></div>

<h4>Notes</h4>
<div class="col-md-6">
	<textarea class="form-control" name="txt_notes" id="txt_notes" placeholder="Notes"></textarea>
</div>
<div class="panel-body"></div>
	
	<div class="col-lg-12" align="right">
		<div id="err_msg"></div>
		<!-- <button name="product_submit" type="submit" class="btn btn-primary" style="display: none;">Delete</button> -->
		<!-- <button name="product_submit" type="submit" class="btn btn-primary" style="display: none;">Print</button> -->
		<!-- <button name="product_submit" type="submit" class="btn btn-primary">Pdf</button> -->
		<!-- <button name="product_submit" type="submit" class="btn btn-primary">Save and Send by Email</button> -->
		<button name="btn_save" type="submit" class="btn btn-primary" id="btn_save" value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
	</div>
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
			    <h4 class="modal-title">Delete Product</h4>
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
<!-- script for select sesries no -->
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
                      $('#ser_no').val(data.estimates);
                      
                    }
                }); 
          }else{
              $('#select_series').html('Select Series first'); 
          }
      });
});

</script>
<!-- only Number validation -->
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

 // script for bill state fetch
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

// script for ship state fetch
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

 // script for autocomplete products fetch
 function auto(){

    var txt_product = document.getElementById("txt_product").value;
    $("#txt_product").autocomplete({
        source: 'autocomplete.php?u_ty=<?php echo $utype;?>&u_id=<?php echo $user_id;?>',
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
 function cust(){

    var txt_cname = document.getElementById("txt_cname").value;
    $("#txt_cname").autocomplete({
        source: 'cust_autocomplete.php?u_ty=<?php echo $utype;?>&u_id=<?php echo $user_id;?>', 
        select: function(a,b)
	        {
	            $(this).val(b.item.value); //grabed the selected value
	            getCustOtherInfo(b.item.value);//passed that selected value
	        }
    });
}

function getCustOtherInfo(name){
        $.ajax({
                     url:'get_customer.php',
                     type:'POST',
                     data:{
                            name:name
                     },

                     success: function(data)
                     {
                       var obj = $.parseJSON(data);
                        $('#txt_cname').val(obj.name);
                        $('#txt_cleagal_id').val(obj.identification);
                        $('#txt_cemail').val(obj.email);
                        $('#txt_cperson').val(obj.contact_person);
                        $('#txt_iaddr').val(obj.invoicing_address);
                        $('#txt_saddr').val(obj.shipping_address);
                        $('#txt_gstno').val(obj.gst_no);
                        $('#txt_state').val(obj.invoice_state);
                        $('#txt_code').val(obj.in_state_code);
                        $('#txt_scperson').val(obj.ship_cont_person);
                        $('#txt_scemail').val(obj.ship_email);
                        $('#txt_sstate').val(obj.ship_state);
                        $('#txt_scode').val(obj.ship_state_code);

                        if(data==1)
                        {
                            alert("update");
                        }
                     } 
            });
    }


</script>

<!-- Insert Script -->
<script>

$('form#myform').submit(function(e){

     e.preventDefault();
    var x = $('#txt_cemail').val();
    var y = $('#txt_scemail').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    var aatpos = y.indexOf("@");
    var adotpos = y.lastIndexOf(".");

	if(document.pressed == 'add_item')
	  {
	  	var txt_qty = $('#txt_qty').val();
	  	var txt_cost =$('txt_cost').val();

	  	 if(txt_qty=="")
	  	 {
	  	 	$('#txt_qty').css('borderColor','red');
			$('#msg').html('Please Enter Quantity');
		    $('#msg').css('color','red');
	  	 }
	  	 else
	  	 {
	  		 $("button#product_submit1").button('loading');
	           $.ajax({
						data:$("#myform").serialize(),
						type:"POST",
						url:'insert_estimate_product.php',
						success: function(data)
						{
							$("button#product_submit1").button('reset');
							 // alert(data);
							if(data==1) 
							{
								// alert('Product Inserted !!!');
								$("#products").load(" #products");
		             		    $("#pro").load(" #pro");
		             		    $("#bill").load(" #bill");
							}
							else if(data==2)
							{
								// alert('Error..');
								$('#pmsg').html('Error In Product Insertion.!!!'); 
								$('#pmsg').css('color','red');

								return false;
							} 
						}
					 
					 });

			  	 	$('#txt_qty').css('borderColor','#ccc');
					$('#msg').html('');
	       }
	}

 	else
	  if(document.pressed == 'save')
	  	{
	  		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		        $('#txt_cemail').css('borderColor','red');
				$('#err_msg').html('Not A valid Recipient Email Address.');
				$('#err_msg').css('color','red');
				$('#txt_scemail').css('borderColor','');
		        return false;
		    }else{
		    if (aatpos<1 || adotpos<aatpos+2 || adotpos+2>=y.length) {
		     	$('#txt_cemail').css('borderColor','');
		        $('#txt_scemail').css('borderColor','red');
				$('#err_msg').html('Not A valid Shipping Email Address.');
				$('#err_msg').css('color','red');
		        return false;
		    }else{	
	  		$("button#btn_save").button('loading');
	         $.ajax({
						data:$("#myform").serialize(),
						type:"POST",
						url:'insert_estimate_invoice.php',
						success: function(data)
						{
							$("button#btn_save").button('reset');
							if(data==1)
							{
								// alert('Save Successfully !!!');
								// window.location.href= "esti_logout.php";

								  swal({
										  position: 'top-right',
		 							      type: 'success',
		  								  title: 'Save Successfully !!!',
		  								  showConfirmButton: false,
		  								  timer: 1500
										})
								  window.setTimeout(function()
								    { 
											window.location.href= "esti_logout.php?us_ty=<?php echo $utype; ?>";
									 	} ,1500);
							}
							else if(data==2)
							{
								// alert('Error....');
								// $('#msg').html('Please Check Error.');
								// $('#msg').css('color','red');
								return false;
							} 
						}
					});
	         	}//end of ship email validation
	     	}//end of email validation

	    }
	  return true;

});

</script>

<!-- Delete Script start -->
<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_esti_product.php',
                            type: "POST",
                            data: {
                                   id:id  
                            },
                            success: function(data)
                                {
                                  //alert(data);
                                    if(data==1)
                                    {
                                        // alert('Deleted Successfully.');
          								// $('#dmsg').html('Product Deleted Successfully.!!!'); 
										// $('#dmsg').css('color','green');
                                        // window.location.reload();
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

	var amt = document.getElementById('txt_cost').value;
	var tax = document.getElementById('select_tax').value;
	var dis = document.getElementById('txt_discount').value;
    var qut = document.getElementById('txt_qty').value;
    // To calculate totalcost of products 
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	// calculate tax
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	
	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);

	// var a =(parseFloat(dis)/100) * parseFloat(totalcost);

	var rdis = parseFloat(totalcost) * parseFloat(dis)/100;
	var taxdis = parseFloat(totalcost)- parseFloat(rdis); 

	var per =(parseFloat(tax)/100) * parseFloat(taxdis);

	var rdiss = parseFloat(totaltax) * parseFloat(dis)/100;
	var final = parseFloat(totaltax)- parseFloat(rdiss); 

   if (!isNaN(final)) 
	{
    	document.getElementById('txt_price').value = parseFloat(final).toFixed(2);
    }
    else if (!isNaN(taxdis)) 
	{
    	document.getElementById('txt_price').value = parseFloat(taxdis).toFixed(2);
    }
    else if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_price').value = parseFloat(totaltax).toFixed(2);
    }
    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_price').value = parseFloat(totalcost).toFixed(2);
    }
		if(!isNaN(per)){

		 document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		}else{
			document.getElementById('tax_amt').value = parseFloat(per1).toFixed(2);
		}

} 

/*calculation*/
onkeyup="taxoncalculation()"
function taxoncalculation()
{	

	var amt = document.getElementById('txt_cost').value;
	var tax = document.getElementById('select_tax').value;
	var dis = document.getElementById('txt_discount').value;
    var qut = document.getElementById('txt_qty').value;
   
	var totalcost =  parseFloat(amt) * parseFloat(qut);
	var rtax = parseFloat(totalcost)* parseFloat(tax)/100; 
	var totaltax = parseFloat(totalcost)+ parseFloat(rtax); 
	
	//To calculate the tax price on cost
	var per1 =(parseFloat(tax)/100) * parseFloat(totalcost);

	var disc_amt =(parseFloat(dis)/100) * parseFloat(totalcost);
	var rdis = parseFloat(totalcost) * parseFloat(dis)/100;
	var taxdis = parseFloat(totalcost)- parseFloat(rdis); 
	
	//calculate tax on discount
	var per =(parseFloat(tax)/100) * parseFloat(taxdis);

	var rdiss = parseFloat(totaltax) * parseFloat(dis)/100;
	var final = parseFloat(totaltax)- parseFloat(rdiss); 

   if (!isNaN(final)) 
	{
    	document.getElementById('txt_price').value = parseFloat(final).toFixed(2);
    }
  else if (!isNaN(taxdis)) 
	{
    	document.getElementById('txt_price').value = parseFloat(taxdis).toFixed(2);
    }

    else if (!isNaN(totaltax)) 
	{
    	document.getElementById('txt_price').value = parseFloat(totaltax).toFixed(2);
    }

    else if(!isNaN(totalcost))
    {
    	document.getElementById('txt_price').value = parseFloat(totalcost).toFixed(2);
    }
    
		document.getElementById('disc_amt').value = parseFloat(disc_amt).toFixed(2);
		

		if(!isNaN(per)){

		 document.getElementById('tax_amt').value = parseFloat(per).toFixed(2);
		}else{
			document.getElementById('tax_amt').value = parseFloat(per1).toFixed(2);
		}

}

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
        $('#idate').datepicker();
       
    })
}
</script>