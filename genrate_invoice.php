<?php
include "config.php";

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) 
{

	$sql= mysql_query("SELECT * FROM common where id='" . $_POST["users"][$i] . "'");

	$data=mysql_fetch_array($sql);
	$id= $data['id'];

	$cust_id= $data['customer_id'];
	$series_id= $data['customer_id'];

}
?>
<form id="myform" name="frm_purchase" autocomplete="off" method="POST" >
<div class="row">
<h3>Edit Challan</h3><hr>

<h4>Client Info</h4>

<input type="hidden" name="data" id="data" value="<?php echo $id;?>">
<div class="col-lg-9">
	<div class="col-md-6">
		<input type="text" class="form-control" name="txt_cname" id="txt_cname" value="<?php if(isset($id)){ echo $data['customer_name'];} else {}?>" placeholder="Client Name" style="text-transform:capitalize;" onkeyup="cust();" required="">

	</div>
	<div class="col-md-3">
		<input type="text" class="form-control" name="txt_cleagal_id" id="txt_cleagal_id" value="<?php if(isset($id)){ echo $data['customer_identification'];} else {}?>" placeholder="Client Leagal Id">
	</div>
	<div class="col-md-3">
		<input type="text" class="form-control" name="txt_gstno" id="txt_gstno" value="<?php if(isset($id)){ echo $data['cust_gst_no'];} else {}?>" placeholder="Client GST Number">
	</div>
	<div class="panel-body"></div>

	<div class="col-md-6">
		<h5 style="text-align: center;"><label>Details of Recipient (Billed To)</label></h5>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_cperson" id="txt_cperson" value="<?php if(isset($id)){ echo $data['contact_person'];} else {}?>" placeholder="Contact Person" required="">
		</div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_cemail" id="txt_cemail" value="<?php if(isset($id)){ echo $data['customer_email'];} else {}?>" placeholder="Client Email Address" required="">
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_state" id="txt_state" value="<?php if(isset($id)){ echo $data['invoice_state'];} else {}?>" placeholder="State">
		</div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_code" id="txt_code" value="<?php if(isset($id)){ echo $data['in_state_code'];} else {}?>" placeholder="State Code">
		</div>

	</div>

	<div class="col-md-6">
		<h5 style="text-align: center;"><label>Details of Consignee (Shipped To)</label></h5>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_scperson" id="txt_scperson" value="<?php if(isset($id)){ echo $data['ship_cont_person'];} else {}?>" placeholder="Contact Person">
		</div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_scemail" id="txt_scemail" value="<?php if(isset($id)){ echo $data['ship_email'];} else {}?>"  placeholder="Client Email Address">
		</div>

		<div class="panel-body"></div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_sstate" id="txt_sstate" value="<?php if(isset($id)){ echo $data['ship_state'];} else {}?>"  placeholder="State">
		</div>

		<div class="col-md-6">
			<input type="text" class="form-control" name="txt_scode" id="txt_scode" value="<?php if(isset($id)){ echo $data['ship_state_code'];} else {}?>" placeholder="State Code">
		</div>

	</div>
	<div class="panel-body"></div>
	
	<div class="col-md-6">
		<textarea class="form-control" name="txt_iaddr" id="txt_iaddr" placeholder="Invoice Address" required=""><?php if(isset($id)){ echo $data['invoicing_address'];} else {}?></textarea>
	</div>
	<div class="col-md-6">
		<textarea class="form-control" name="txt_saddr" id="txt_saddr" placeholder="Shipping Address"><?php if(isset($id)){ echo $data['shipping_address'];} else {}?></textarea>

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
<!-- 	<label>Status</label> draft<br>
	<label>Force to be closed</label> <input type="checkbox"><br>
	<label>Sent by email</label> <input type="checkbox"> -->
</div>
<div class="panel-body"></div>

<h4>Payment Details</h4>
<div class="col-lg-12">
	<div class="col-md-1">
		<label>Series</label>
	</div>
	<div class="col-md-3">
	
		<select class="form-control" name="select_series">
		<?php
			$query = mysql_query("SELECT a.* FROM series a INNER JOIN common b ON a.id=b.series_id WHERE b.id='$id'");
				$row1=mysql_fetch_array($query);
		 ?>
			<option value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
		</select>
	</div>
	<div class="col-md-1">
		<label>Issue Date</label>
	</div>
	<div class="col-md-3">
		<input type="date" class="form-control" name="idate" id="idate">
	</div>
	<div class="col-md-1">
		<label>Due Date</label>
	</div>
	<div class="col-md-3">
		<input type="date" class="form-control" name="ddate" id="ddate">
	</div>
</div>
<div class="panel-body"></div>

<div class="col-lg-12" id="products">
  <div class="panel panel-default">
    <div style="height: 200px; overflow-y: scroll; overflow-x: hidden;">
      <table>

	  <thead>
		<tr>
		  <th>Product</th>
		  <th>Description</th>
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
	  	for($i=0;$i<$rowCount;$i++) 
		{

			$sql= mysql_query("SELECT * FROM common where id='" . $_POST["users"][$i] . "'");

			$data=mysql_fetch_array($sql);
			$id1= $data['id'];

	  	$sq = mysql_query("SELECT b.reference,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN challan_invoice d ON c.id=d.cha_id  WHERE  a.common_id='$id1' and a.status=1")or die(mysql_error($connection));
		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$id1=$row['id'];
		  		 $tax = $row['tax_amt'];
		  		 $a=$tax/2; // Divide tax into SGST and CGST
	  ?>
		<tr>
			<td><?php echo $row['reference'];?></td>
			<td><?php echo $row['description'];?></td>
			<td>Rs.<?php echo $row['unitary_cost'];?></td>
			<td><?php echo $row['quantity'];?></td>

			<!-- <td><?php echo $a;?></td> -->
			<td>
			  <?php

					$sel=mysql_query("SELECT b.sgst,b.cgst,b.value,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value  where a.item_id=$id1");
					while($arr=mysql_fetch_array($sel))
						{
							echo "<br>".$arr['sgst'];echo "&nbsp;-&nbsp;Rs.".$a; echo "<br>".$arr['cgst'];echo "&nbsp;-&nbsp;Rs.".$a;
						}
				?>
			</td>
			<td><?php echo $row['discount'];?>%</td>
			<td>Rs.<?php echo $row['price'];?></td>
			<td>
				<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id1;?>');"><span class="icon fa fa-trash-o" ></span>
				</button>
		    </td>
		</tr>
		<?php
			}
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

for($i=0;$i<$rowCount;$i++) 
{
	if($rowCount<2){

	$sum = mysql_query("SELECT SUM(a.base_amount) AS base, SUM(a.discount_amount) AS Total_dis, SUM(a.tax_amount) AS Total_tax,SUM(a.gross_amount) AS Total_price  FROM `common` a INNER JOIN challan_invoice b ON a.id=b.cha_id WHERE a.id='".$_POST["users"][$i]."' ")or die(mysql_error($connection));
	
}else{
	$sum = mysql_query("SELECT SUM(a.base_amount) AS base, SUM(a.discount_amount) AS Total_dis, SUM(a.tax_amount) AS Total_tax,SUM(a.gross_amount) AS Total_price  FROM `common` a INNER JOIN challan_invoice b ON a.id=b.cha_id ")or die(mysql_error($connection));
}
}
	while($arr=mysql_fetch_array($sum))
	{
		$base=$arr['base'];
		$discount =$arr['Total_dis'];

		$Subtotal =$base-$discount;
?>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Base</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_base" id="txt_base" value="<?php echo $arr['base'];?>" placeholder="Base">
	</div>
	<div class="panel-body" ></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Discount</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_total_discount" id="txt_total_discount" value="<?php echo $arr['Total_dis'];?>" placeholder="Discount">
	</div>
	<div class="panel-body"></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Subtotal</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_subtotal" id="txt_subtotal" value="<?php echo $Subtotal;?>"  placeholder="Subtotal">
	</div>
	<div class="panel-body"></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Taxes</label>
	</div>
	<div class="col-md-2">

		<input type="text" class="form-control" name="txt_total_tax" id="txt_total_tax" value="<?php echo $arr['Total_tax'];?>" placeholder="Taxes">

	</div>
	<div class="panel-body"></div>
	<div class="col-md-9"></div>
	<div class="col-md-1">
		<label>Total</label>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control" name="txt_total" id="txt_total" value="<?php echo $arr['Total_price'];?>" placeholder="Total">

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
	<textarea class="form-control" name="txt_notes" id="txt_notes" placeholder="Notes"><?php if(isset($_GET["id"])){ echo $data['notes'];} else {}?></textarea>
</div>
<div class="panel-body"></div>

<!-- <h4>Tags</h4>
	<div class="col-md-6">
		<input type="text" class="form-control" name="txt" placeholder="Tags">
	</div>
	<div class="panel-body"></div>
	 -->
	<div class="col-lg-12" align="right">
	
	<button name="product_submit" type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#delInvoice" onclick="$('#dele_id').val('<?php echo $id;?>');">Delete&nbsp; <span class="glyphicon glyphicon-remove"></span></button>
	<button type="submit" class="btn btn-primary" name="print_button" id="print_button" value="Print" onclick="PrintDiv();"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button>
	<!-- <button name="convert_pdf" id="create_pdf" type="submit" class="btn btn-primary" onclick="PrintDiv();">Pdf</button> -->
	<!-- <button name="product_submit" type="submit" class="btn btn-primary" onclick="emailDiv(<?php echo $id;?>)">Save and Send by Email</button> -->
	<button name="btn_save" type="submit" class="btn btn-primary" id="btn_save" value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
	<?php 
        require_once"print_challan.php";
	?>
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

 <!--Delete model start here-->

<div id="delInvoice" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->

		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Delete Challan</h4>
		  	</div>
			   <form  id="dele" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data" id="dele_id">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_invoice" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>

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

<script>
function PrintDiv()
{    
	var divToPrint = document.getElementById('divToPrint');
	var popupWin = window.open('', '_blank', 'width=800,height=620');

	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
}

// function PdfDiv()
// {    

// 	var divToPrint = document.getElementById('divToPrint1');
// 	var popupWin = window.open('', '_blank', 'width=800,height=620');

// 	popupWin.document.open();
// 	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
// 	popupWin.document.close();
// }

</script>
<script>

function emailDiv(id)
{
	
	var id=id;

		$.ajax({
			
			url:'new_mail.php?eid=<?php echo $id;?>',
			type:'POST',
			data:{
					id:id
				
			},
			success:function(data)
			{
				
				alert(data);
					// $('#acceptwashercontent').html(data);
					// $('#myModal-1').modal('show');
				
			}
			
		});
		
	
}



</script>


<script type="text/javascript">
	// $(function() 
	// {
	//  $( "#txt_product" ).autocomplete({
	//   source: 'autocomplete.php'
	//  });
	// });

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
 function cust(){

    var txt_cname = document.getElementById("txt_cname").value;
    $("#txt_cname").autocomplete({
        source: 'cust_autocomplete.php', 
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
						url:'update_challan_product.php',
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
							else if(data==0)
							{
								// alert('Error..');
								$('#pmsg').html('Product Already Exits.!!!'); 
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
	  		$("button#btn_save").button('loading');
	         $.ajax({
						data:$("#myform").serialize(),
						type:"POST",
						url:'update_challan.php',
						success: function(data)
						{
							$("button#btn_save").button('reset');
							if(data==1)
							{
								// alert('Save Successfully !!!');
								// $('#msg').html('Save Successfully.!!!'); 
								// $('#msg').css('color','green');
								 // window.location.href= "dashboard.php?page=edit_new_invoice&id=<?php echo $id;?>";
								 swal({
										  position: 'top-right',
		 							      type: 'success',
		  								  title: 'Save Successfully !!!',
		  								  showConfirmButton: false,
		  								  timer: 1500
								  	  })
								  window.setTimeout(function()
								    { 
								     window.location.href= "dashboard.php?page=edit_challan&id=<?php echo $id;?>";
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
                            url:'delete_challan_product.php',
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
                                       	swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Deleted Successfully !!!',
			  								  showConfirmButton: false,
			  								  timer: 1500
											})
										  window.setTimeout(function()
										    { 
 												window.location.reload();
 										 	} ,1500);
                                    }                          
                                }
                        });
        })
//Delete invoice script

    $("#delete_invoice").click(function(e)
       { 
            var id=$('#dele_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_challan.php',
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
          							
                                        // window.location.href= "dashboard.php?page=invoices";
                                          swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'Deleted Successfully !!!',
			  								  showConfirmButton: false,
			  								  timer: 1500
											})
										  window.setTimeout(function()
										    { 
 												 window.location.href= "dashboard.php?page=challans";
 										 	} ,1500);
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
        $('#ddate').datepicker();
    })
}
</script>