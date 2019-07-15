<?php
$user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type']; 
$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
$array=mysql_fetch_array($sub);
$sub_id=$array['user_id'];

	if($id = isset($_GET['id']) ? $_GET['id'] : '')
	{
		$row=mysql_query("select * from product where id=$id");
		$data=mysql_fetch_array($row);
	}
	else{
		$data['reference']="";
		$data['hsn_code']="";
		$data['description']="";
		$data['base_price']="";
		$data['created_at']="";
		$data['updated_at']="";
		// $data['units']="";
	}
?>

<div class="row">
	<div class="col-md-4"><h3>Product</h3></div>
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
	<h4>Product info</h4>
	<form name="frm_product" id="frm_product" autocomplete="off" method="POST">
	<div class="col-lg-9">
		
		<div class="col-md-3">
			<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>

			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
			<label>Product Name<span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_pname" value="<?php echo $data['reference'];?>" placeholder="Product Name" required>
		</div>

		<div class="col-md-3">
		<label>HSN/SAC</label>
			 <input type="text" class="form-control" name="txt_hsn" value="<?php echo $data['hsn_code'];?>" placeholder="HSN/SAC">
		</div>
		
		<div class="col-md-6">
		<label>Product Description</label>
			<input type="text" class="form-control" name="txt_desc" value="<?php echo $data['description'];?>" placeholder="Product Description">
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
		<label>Product Price <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="txt_price" value="<?php echo $data['base_price'];?>" placeholder="Product Price" required>
		</div>

		<!-- <div class="col-md-3">
			<input type="text" class="form-control" name="txt_units" value="<?php echo $data['units'];?>" placeholder="Units Available">
		</div> -->
		<div class="panel-body"></div>
		
		<div class="col-md-6">
		<?php 
			if(empty($id)){
		 ?>
			<button name="btn_product" type="submit" id="btn_product" class="btn btn-primary" value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
		<?php 
		}
		else{
		 ?>
			<button name="btn_product_edit" type="submit" id="update" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
		<?php } ?>
		</div>
	</div>
	</form>
	<div class="panel-body"></div>
	
<div class="col-md-12">
  <h4>Product List</h4>
      <table class="table table-striped table-bordered table-hover dataTable no-footer" id="example">
      <thead>
        <tr bgcolor="#999999">
          <td>Sr. No</td>
          <td>Reference</td>
          <td>HSN/SAC</td>
          <td>Description</td>
          <td>Price</td>
          <!-- <td>Units</td> -->
		  <td>Sold</td>		  
		  <td>Edit</td>
        </tr>
        </thead>
        <tbody>
        <?php
        if($utype=='admin')
		{
			$qry=mysql_query("SELECT * FROM product WHERE user_id='$user_id' ORDER BY `id` DESC")or die(mysql_error());
		}
		else{
			$qry=mysql_query("SELECT * FROM product WHERE user_id='$sub_id' ORDER BY `id` DESC")or die(mysql_error());
		}
			$cnt=1;
			while($row=mysql_fetch_array($qry)){
		?>
        <tr>
          <td><?php echo $cnt++ ?></td>
          <!-- <td><?php echo $row['id']; ?></td> -->
          <td><?php echo $row['reference'];?></td>
          <td><?php echo $row['hsn_code'];?></td>
          <td><?php echo $row['description'];?></td>
		  <td><?php echo $row['base_price'];?></td>
          <!-- <td><?php echo $row['units'];?></td> -->
          <td><?php echo $row['sold'];?></td>
          <td>
         
           <?php 
			  	if($utype=='admin')
				{
			   ?>
			  <?php echo "<a href='dashboard.php?page=product&id=".$row['id']."' title='Edit Product' data-toggle='tooltip'>";?><span class="icon fa fa-edit"></span></a>
			  <?php 
			 	 }
			 	 else
			 	 {
			   ?>
			   <?php echo "<a href='user_dashboard.php?page=product&id=".$row['id']."' title='Edit Product' data-toggle='tooltip'>";?><span class="icon fa fa-edit"></span></a>
			   <?php } ?>
          </td>
        </tr>
        <?php }?>
        </tbody>
      </table>
</div>
</div>
<!-- Insert Script -->
<script>

$('form#frm_product').submit(function(e){

     e.preventDefault();

	if(document.pressed == 'save')
	  {
	  	$("button#btn_product").button('loading');
	           $.ajax({
						data:$("#frm_product").serialize(),
						type:"POST",
						url:'ins_product.php',
						success: function(data)
						{
							$("button#btn_product").button('reset');
							 // alert(data);
							if(data==1) 
							{
							   // alert('Product Inserted !!!');
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Your product has been saved',
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

 	else
	  if(document.pressed == 'update')
	  	{
	  		$("button#update").button('loading');
	         $.ajax({
						data:$("#frm_product").serialize(),
						type:"POST",
						url:'upd_product.php',
						success: function(data)
						{
							$("button#update").button('reset');
							if(data==1)
							{
								// alert('Updated Successfully !!!');
							 
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Your product has been updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "user_dashboard.php?page=product";
								 	} ,1500);

								
							}
							else if(data==3)
							{
								// alert('Updated Successfully !!!');
							 
								swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Your product has been updated',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								      window.location.href= "dashboard.php?page=product";
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

	    }
	  return true;

});

</script>