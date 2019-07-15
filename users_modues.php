<?php 
$user_id=$_SESSION['login_user'];
?>
<div class="row">
<!-- /.panel-heading -->
<div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="dashboard.php?page=setting">Company Setting</a></li>
        <li><a href="dashboard.php?page=series_setting">Series Setting</a></li>
        <li><a href="dashboard.php?page=my_setting">My Setting</a></li>
        <li><a href="dashboard.php?page=print_template">Printing Templates</a></li>
        <li class="active"><a href="dashboard.php?page=create_user">Create Users Setting</a></li>
        <?php 
            $aa1 = mysql_query("SELECT * FROM company WHERE user_id='$user_id'")or die(mysql_error($connection));
				$rrr=mysql_fetch_array($aa1);
					  					  	
					$vouch = $rrr['voucher'];
				if($vouch== 'Yes')
				{  	
            ?>
        <li><a href="dashboard.php?page=expenses_setting">Expenses Setting</a></li>
        <?php 
       	 }
        else{}
        ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
		<!-- Tab 1 -->
        <div class="tab-pane fade in active" id="modues">
            <h3>Users Setting</h3><hr>
            
            <form id="tabs" name="tabs" autocomplete="off" method="POST" >
            <input type="hidden" name="tab" id="tab" value="<?php echo $id;?>">
            <input type="hidden" name="usr_id" id="usr_id" value="<?php echo $user_id;?>">

           <div class="col-md-6">
			<div class="col-md-12">
				<label>Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Name"  style="text-transform:capitalize;" required></div><div class="panel-body">
			</div>

			<div class="col-md-12"><label>Email <span class="required_field">*</span></label><input type="email" class="form-control" name="email" id="email" placeholder="Email-ID" required=""></div><div class="panel-body"></div>
			
			<div class="col-md-12">
			<label>Mobile No <span class="required_field">*</span></label>
			<input type="text" class="form-control" name="mob" id="mob" placeholder="Mobile No" MaxLength="10" pattern="^[789]\d{9}$" required></div>

			<div class="panel-body"></div>

			<div class="col-md-12">
			<label>Password <span class="required_field">*</span></label>
			<input type="password" class="form-control" name="pass" id="pass"  placeholder="Password"></div><div class="panel-body" required></div>
			<div class="col-md-12">
				<label>Confirm Password<span class="required_field">*</span></label>
			<input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" required></div>
			<div class="panel-body"></div>
			<p id="rrmsg"></p>
			</div>
			 <div class="col-md-6">
			<h4>Assign permissions for this User</h4>
			<ul>
				<li><input type="checkbox" name="access[]" value="master" id="invoice">&nbsp;Master Module </li>
				<li><input type="checkbox" name="access[]" value="project" id="product">&nbsp;Project Module </li>
				<li><input type="checkbox" name="access[]" value="material" id="material">&nbsp;Material Module </li>
				<li><input type="checkbox" name="access[]" value="flat" id="customer">&nbsp;Falt Booking Module </li>
				<li><input type="checkbox" name="access[]" value="report" id="voucher">&nbsp;Report Module</li>
				<li><input type="checkbox" name="access[]" value="billing" id="purchase" >&nbsp;Billing Module </li>
				<li><input type="checkbox" name="access[]" value="payment" id="sales" >&nbsp;Payment Module </li>
				<li><input type="checkbox" name="access[]" value="vendor" id="director" >&nbsp;Vendor Module </li>

			</ul>
			</div>
			
			<div class="col-lg-12" align="right">
			<p id="mssg"></p>
				<button name="btn_save" type="submit" value="<?php echo $id;?>" id="save" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			</div>
			</form>
			<div class="panel-body"></div>
			<h4>Assigned Users Permissions</h4>
			<table class="table table-striped table-bordered table-hover dataTable no-footer" id="example1">
			  	<thead>
					<tr class="table_head" bgcolor="#999999">
					  <td>Sr. No</td>
					  <td>Name</td>
					  <td>Email-Id</td>
					  <td>Mobile No</td>
					  <td>Master</td>
					  <td>Project</td>
					  <td>Material</td>
					  <td>Flat Booking</td>
					  <td>Report</td>
					  <td>Billing</td>
					  <td>Payment</td>
					  <td>Vendor</td>
					  <td>Delete</td>
					</tr>
				</thead>
				<tbody>
				<?php
						error_reporting(0);
						$qry=mysql_query("SELECT * FROM user_profile WHERE user_id='$user_id' ORDER BY `id` DESC")or die(mysql_error());
						$cnt=1;
						while($row=mysql_fetch_array($qry)){
							$id=$row['id'];
							$result_explode = explode(',', $row['permission']);
							
							$a=$result_explode[0];
   							$b= $result_explode[1];
   							$c= $result_explode[2];
   							$d=$result_explode[3];
   							$e= $result_explode[4];
   							$f= $result_explode[5];
   							$g= $result_explode[6];
   							$h= $result_explode[7];
					?>
					<tr>
					  <td><?php echo $cnt++ ?></td>
					  <td><?php echo $row['name'];?></td>
					  <td><?php echo $row['email'];?></td>
					  <td><?php echo $row['mobile'];?></td>
					  <td>
					  	<?php  if ($a=='master'||$b=='master'||$c=='master'||$d=='master'||$e=='master'||$f=='master'||$g=='master'||$h=='master') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='project'||$b=='project'||$c=='project'||$d=='project'||$e=='project'||$f=='project'||$g=='project'||$h=='project') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='material'||$b=='material'||$c=='material'||$d=='material'||$e=='material'||$f=='material'||$g=='material'||$h=='material') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='flat'||$b=='flat'||$c=='flat'||$d=='flat'||$e=='flat'||$f=='flat'||$g=='flat'||$h=='flat') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='report'||$b=='report'||$c=='report'||$d=='report'||$e=='report'||$f=='report'||$g=='report'||$h=='report') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='billing'||$b=='billing'||$c=='billing'||$d=='billing'||$e=='billing'||$f=='billing'||$g=='billing'||$h=='billing') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='payment'||$b=='payment'||$c=='payment'||$d=='payment'||$e=='payment'||$f=='payment'||$g=='payment'||$h=='payment') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>
					  <td>
					  	<?php  if ($a=='vendor'||$b=='vendor'||$c=='vendor'||$d=='vendor'||$e=='vendor'||$f=='vendor'||$g=='vendor'||$h=='vendor') {
	   					?>	
	   					<i class="ace-icon fa fa-check bigger-110" style="color: green;"></i>

	   					<?php }else{?>
					  	<i class="ace-icon fa fa-remove bigger-110" style="color: red;"></i>
	   					<?php } ?>
					  </td>

					 <td>
					 	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#udeleteModal" onclick="$('#udel_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span> </button>
					</td>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!-- /.panel-body -->
</div>

<!--Delete User model start here-->

<div id="udeleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete User</h4>
		  	</div>
			   <form  id="udel" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="udata" id="udel_id">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_user" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>

<script>

$('form#tabs').submit(function(e){

	var pass=$('#pass').val();
	var cpass=$('#cpass').val();
	var x = $('#email').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

	e.preventDefault();
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        $('#email').css('borderColor','red');
			$('#mssg').html('Not A valid Email Address.');
			$('#mssg').css('color','red');
	        return false;
	    }else{ 
	   if(pass==cpass)
	   	  { 
	   	  	
		   	 if(pass.length>=4 && pass.length<=10)
	          {      
			    $("button#save").button('loading');
			   	$.ajax({
			            url:'user_permission.php',
			            type: "POST",
			            data: new FormData(this),
			            contentType:false,
			            processData:false,
			            success: function(data)
		           	 	{
		           	 		$("button#save").button('reset');
		                    if(data==1)
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
		                    	alert("Error..");
		                    }
		            	}
			   		});
			   	
              }
              else
              {
              	$('#cpass').css('borderColor','#ccc');
                $('#pass').css('borderColor','red');
                $('#mssg').html('Password must be between 4 to 10 characters.');
                $('#mssg').css('color','red');
              }
		}
		else
		{
			$('#cpass').css('borderColor','red');
			$('#rrmsg').html('Password Not Match.');
			$('#rrmsg').css('color','red');
		}
	}//end email validation
});

//  Delete Users start 
$("#delete_user").click(function(e)
{ 
    var id=$('#udel_id').val();
    e.preventDefault();

       $.ajax({
                url:'delete_user.php',
                type: "POST",
                data: {
                       id:id  
                },
                success: function(data)
                {
                    if(data==1)
                    {
							window.location.reload();
                    }                          
                }
            });
})
</script>