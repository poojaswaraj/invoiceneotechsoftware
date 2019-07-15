<?php
	
	$user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type']; 
$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
$array=mysql_fetch_array($sub);
$sub_id=$array['user_id'];

	if($id = isset($_GET['id']) ? $_GET['id'] : '')
	{
		$row=mysql_query("select * from customer where id=$id");
		$data=mysql_fetch_array($row);
	}
	else{
		$data['name']="";
		$data['name_slug']="";
		$data['identification']="";
		$data['gst_no']="";
		$data['email']="";
		$data['contact_person']="";
		$data['invoicing_address']="";
		$data['shipping_address']="";
	}
?>

<div class="row">
	<div class="col-md-4"><h3>Customers</h3></div>
	<div class="col-md-8" align="center">
	<?php if(isset($_GET['status'])&&$_GET['status']==1){ ?>
		<div class="alert alert-success"><label>Data Successfully Insert...</label></div>
	<?php }
			if(isset($_GET['status'])&&$_GET['status']==2){ ?>
		<div class="alert alert-success"><label>Data Successfully Update...</label></div>
	<?php }
			if(isset($_GET['status'])&&$_GET['status']==3){ ?>
		<div class="alert alert-danger"><label>Something Wrong...</label></div>
	<?php }
			if(isset($_GET['status'])&&$_GET['status']==4){ ?>
		<div class="alert alert-danger"><label>Select Employee Code...</label></div>
	<?php } ?>
	</div>
	<div class="panel-body"></div>
	<hr>
	<h4>Client Info</h4>
	<form name="frm_customer" id="frm_customer" autocomplete="off" method="POST">
	<div class="col-lg-9">
		<div class="col-md-6">
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			<label>Client Name <span class="required_field">*</span></label>
			<input type="text" class="form-control" style="text-transform:capitalize;" name="txt_cname" id="txt_cname" value="<?php echo ucwords($data['name']);?>" placeholder="Client Name" onkeyup="cust();" required/>
		</div>
		<div class="col-md-3">
		<label>Client PAN No</label>
			<input type="text" class="form-control" name="txt_cleagal_id" id="txt_cleagal_id" value="<?php echo $data['identification'];?>" placeholder="Client PAN No">
		</div>
		<div class="col-md-3">
		<label>Client GST No</label>
			<input type="text" class="form-control" name="txt_gstno" id="txt_gstno" value="<?php echo $data['gst_no'];?>" placeholder="Client GST No">
		</div>
		<div class="panel-body"></div>
		<div class="col-md-6">
		<label>Contact Person <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_cperson" id="txt_cperson" value="<?php echo $data['contact_person'];?>" placeholder="Contact Person" required/>
		</div>
		<div class="col-md-6">
		<label>Client Email <span class="required_field">*</span></label>
			<input type="email" class="form-control" name="txt_cemail" id="txt_cemail" value="<?php echo $data['email'];?>" placeholder="Client Email" required/>
		</div>
		<div class="panel-body"></div>
		<div class="col-md-6">
		<label>Invoice Address <span class="required_field">*</span></label>
			<textarea class="form-control" name="txt_iaddr" id="txt_iaddr" placeholder="Invoice Address" required><?php echo $data['invoicing_address'];?></textarea>
		</div>
		<div class="col-md-6">
		<label>Shipping Address</label>
			<textarea class="form-control" name="txt_saddr" id="txt_saddr" placeholder="Shipping Address"><?php echo $data['shipping_address'];?></textarea>
		</div>
		<div class="panel-body"></div>
		<div class="col-md-6" >
		<?php 
				if(empty($id)){
		 ?>
			<button name="btn_customer" id="btn_customer" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
		<?php 
		}
		else{
		 ?>
			<button name="btn_customer_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
		<?php } ?>
		<div id="err_msg"></div>
		</div>
	</div>
	</form>
	<div class="panel-body"></div>
	
<div class="col-md-12">
  <h4>Recent Customer</h4>
      <table class="table table-striped table-bordered table-hover dataTable no-footer" id="example">
      <thead>
        <tr bgcolor="#999999">
          <td>Sr. No</td>
          <td>Customer Name</td>
          <td>PAN Card No</td>
          <td>Due</td>
          <td>Total</td>
		  <td>Edit</td>
          <td>Invoice</td>
        </tr>
        </thead>
        <tbody>
        <?php
		 if($utype=='admin')
			{
      		 		
			  	$qry=mysql_query("SELECT * FROM customer WHERE user_id='$user_id'")or die(mysql_error());
      		}else{
      			$qry=mysql_query("SELECT * FROM customer WHERE user_id='$sub_id' AND sub_user_id='$user_id' ")or die(mysql_error());
      		}
       	
			$cnt=1;
			while($row=mysql_fetch_array($qry)){
				$c_id=$row['id'];

		 if($utype=='admin')
			{
				$qry1=mysql_query("SELECT SUM(gross_amount) as Total, SUM(due_amt) as Due FROM common WHERE  customer_id='$c_id' and type='Invoice' and user_id='$user_id' ")or die(mysql_error());
			}
			else
			{
				$qry1=mysql_query("SELECT SUM(gross_amount) as Total, SUM(due_amt) as Due FROM common WHERE  customer_id='$c_id' and type='Invoice' and user_id='$sub_id' AND sub_user_id='$user_id' ")or die(mysql_error());

			}
					$row1=mysql_fetch_array($qry1);

					$amt=$row1['Total'];
		?>
        <tr>
          <td><?php echo $cnt++ ?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['identification'];?></td>
          <td><?php echo $row1['Due'];?></td>
          <?php 
          		if(empty($amt)){
           ?>
            <td><?php echo "Rs.0.00" ?> </td>
           <?php 
           		}
           		else{
            ?>
          <td><?php echo"Rs.".$row1['Total'];?></td>
          <?php } ?>
          <td>
            <?php 
			  	if($utype=='admin')
				{
			   ?>
			     <?php echo "<a href='dashboard.php?page=customers&id=".$row['id']."'>";?><span class="icon fa fa-edit"></span></a>
			  <?php 
			 	 }
			 	 else
			 	 {
			   ?>
			     <?php echo "<a href='user_dashboard.php?page=customers&id=".$row['id']."'>";?><span class="icon fa fa-edit"></span></a>
			   <?php } ?>
          </td>
		  <td>
		   <?php 
			  	if($utype=='admin')
				{
			   ?>
			     <?php echo "<a href='dashboard.php?page=invoices&id=".$row['id']."'  title='View Invoices' data-toggle='tooltip'>";?><span class="icon fa fa-money"></span></a>
			  <?php 
			 	 }
			 	 else
			 	 {
			   ?>
			      <?php echo "<a href='user_dashboard.php?page=invoices&id=".$row['id']."'  title='View Invoices' data-toggle='tooltip'>";?><span class="icon fa fa-money"></span></a>
			   <?php } ?>
		  </td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
</div>

<script>
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

$('form#frm_customer').submit(function(e){

     e.preventDefault();
    var x = $('#txt_cemail').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

	if(document.pressed == 'save')
	  {
	  	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		        $('#txt_cemail').css('borderColor','red');
				$('#err_msg').html('Not A valid Email Address.');
				$('#err_msg').css('color','red');
		        return false;
		    }else{
	  	  $("button#btn_customer").button('loading');
	           $.ajax({
						data:$("#frm_customer").serialize(),
						type:"POST",
						url:'insert_customer.php',

						success: function(data)
						{
							$("button#btn_customer").button('reset');
							 // alert(data);
							 
							if(data==1) 
							{
							   // alert('Voucher Inserted !!!');
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
							
						}
					 
					 });
	            $('#txt_cemail').css('borderColor','');
				$('#err_msg').html('');
	          }//end of email validation
	}

 	else
	  if(document.pressed == 'update')
	  	{
	  		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		        $('#txt_cemail').css('borderColor','red');
				$('#err_msg').html('Not A valid Email Address.');
				$('#err_msg').css('color','red');
		        return false;
		    }else{
	  		$("button#update").button('loading');
	         $.ajax({
						data:$("#frm_customer").serialize(),
						type:"POST",
						url:'update_customer.php',
						success: function(data)
						{
							$("button#update").button('reset');

							if(data==1)
							{
								// alert('Updated Successfully !!!');
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Customer info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=customers";
								 	} ,1500);
				
							}
							else if(data==3)
							{
								// alert('Updated Successfully !!!');
								
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Customer info has been Updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=customers";
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
	         	$('#txt_cemail').css('borderColor','');
				$('#err_msg').html('');
	          }//end of email validation
	    }
	  return true;

});

</script>