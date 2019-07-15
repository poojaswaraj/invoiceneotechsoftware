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
        <li class="active"><a href="dashboard.php?page=my_setting">My Setting</a></li>
        <li><a href="dashboard.php?page=print_template">Printing Templates</a></li>
        <li><a href="dashboard.php?page=create_user">Create Users Setting</a></li>
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
        <div class="tab-pane fade in active" id="series">
           	<!-- Tab 2 -->
            <h3>My Setting</h3><hr>
            <form id="mysettingform" name="mysetting" autocomplete="off" method="POST" >
            	<input type="hidden" name="data" id="data" value="<?php echo $_SESSION['login_user']; ?>">
            <?php 
            	$sql=mysql_query("SELECT * FROM user WHERE id='$user_id'")or die(mysql_error($connection));
            	$row=mysql_fetch_array($sql);
            ?>
            <div class="col-lg-6">
				<div class="col-lg-12">
					<h4>About You</h4>
					<div class="col-md-6">
						<label>Company Name <span class="required_field">*</span></label>
					</div><div class="panel-body"></div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="txt_cname" id="txt_fname" value="<?php echo $row['comp_name']; ?>" placeholder="Company Name" required>
					</div>
					<div class="panel-body"></div>
					
					<div class="col-md-6">
						<label>User Name <span class="required_field">*</span></label>
					</div><div class="panel-body"></div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="txt_name" id="txt_lname" value="<?php echo $row['name']; ?>" placeholder="Name" required>
					</div>
					<div class="panel-body"></div>

					<div class="col-md-6">
						<label>Contact No <span class="required_field">*</span></label>
					</div><div class="panel-body"></div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="txt_cont" id="txt_cont" value="<?php echo $row['contact']; ?>" placeholder="Contact No" required>
					</div>
					<div class="panel-body"></div>
					
					<div class="col-md-6">
						<label>Email <span class="required_field">*</span></label>
					</div><div class="panel-body"></div>
					<div class="col-md-6">
						<input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $row['username']; ?>" placeholder="Email" required>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="col-lg-12">
				<h4>Change Your Password</h4>
				<div class="col-md-6">
					<label>Old Password <span class="required_field">*</span></label>
				</div><div class="panel-body"></div>
				<div class="col-md-6">
					<input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Old Password" onchange="checkpass()">
				</div>
				<center><p id="msg1"></p></center>
				<div class="panel-body"></div>
				
				<div class="col-md-6">
					<label>New Password <span class="required_field">*</span></label>
				</div><div class="panel-body"></div>
				<div class="col-md-6">
					<input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="New Password" >
				</div>
				<div class="panel-body"></div>
				
				<div class="col-md-6">
					<label>Confirm Password <span class="required_field">*</span>	</label>
				</div><div class="panel-body"></div>
				<div class="col-md-6">
					<input type="password" class="form-control" name="cnew_pass" id="cnew_pass" placeholder="Confirm Password">
				</div>
				</div>
				<p id="errormsg"></p>
			</div>
			
			<div class="col-lg-12" align="right">
				<button name="btn_save" type="submit" class="btn btn-primary" id="btn_save" value="save">Save</button>
			</div>
			<center><p id="msg"></p></center>
			</form>
		 </div>
		</div>
		</div>
<!-- /.panel-body -->
</div>

<!--Delete Series model start here-->

<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Invoice Series</h4>
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

// Tab2 ajax mysetting
$('form#mysettingform').submit(function(e){

	var new_pass = $('#new_pass').val();
	var cnew_pass = $('#cnew_pass').val();
	var txt_cont = $('#txt_cont').val();
        e.preventDefault();

        if(new_pass==cnew_pass)
        {
        	if(new_pass.length>=4 && new_pass.length<=10)
              {   
              	if(txt_cont.length>=10 && txt_cont.length<=15)
             	{    
		            $.ajax({
		                        url:'insert_mysetting.php',
		                        type: "POST",
		                        data: new FormData(this),
		                        contentType:false,
		                        cache:false,  
		                        processData:false,
		                        success: function(data)
		                       	 	{
		                               
		                                 // alert(data);
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
		                                else if(data==2){

		                                	// $('#old_pass').css('borderColor','red');
											$('#msg1').html('Please Check All Field .');
											$('#msg1').css('color','red');

		                                }
		                                 else if(data==3){

		                                	$('#old_pass').css('borderColor','red');
											$('#msg1').html('Please Enter Correct Password.');
											$('#msg1').css('color','red');
										
		                                }
		                            	
		                        	}
		           			});
		           }
                  else
                  {
                  	$('#cnew_pass').css('borderColor','#27b6ee');
                    $('#txt_cont').css('borderColor','red');
                    $('#errormsg').html('Mobile Number between 10 to 15 Number.');
                    $('#errormsg').css('color','red');
                  }
	       	 }
   			 else
   				{
	   			 	// $('#cnew_pass').css('borderColor','red');
					$('#errormsg').html('Password must be between 4 to 10 characters.');
					$('#errormsg').css('color','red');
   				}
	       	}
   			 else
   				{
	   			 	$('#cnew_pass').css('borderColor','red');
					$('#errormsg').html('Password Not Match.');
					$('#errormsg').css('color','red');
   				}
    });
//  Delete Series Script start 
$("#delete_btn").click(function(e)
   { 
        var id=$('#del_id').val();
		e.preventDefault();
	
       $.ajax({
                url:'delete_series.php',
                type: "POST",
                data:{
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


// To check old Password
function checkpass(){

		var old_pass =$('#old_pass').val();

		 $.ajax({
                    url:'checkpass.php',
					type:'POST',
					data:{
							old_pass:old_pass
						 },
					success: function(data)
					{
	                    if(data==1)
                        {
                            // alert("Inserted Successfully..");
							$('#old_pass').css('borderColor','#27b6ee');
							$('#msg1').html('');
							document.getElementById('new_pass').disabled=false;
							document.getElementById('cnew_pass').disabled=false;
							document.getElementById('btn_save').disabled=false;
                        }
                        else if(data==2)
                        {
                        	$('#old_pass').css('borderColor','red');
							$('#msg1').html('Please Enter Correct Password.');
							$('#msg1').css('color','red');
							document.getElementById('new_pass').disabled=true;
							document.getElementById('cnew_pass').disabled=true;
							document.getElementById('btn_save').disabled=true;
                        }
                    }
					
			    });
	}

</script>