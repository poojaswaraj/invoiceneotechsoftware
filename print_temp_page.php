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
        <li class="active"><a href="dashboard.php?page=print_template">Printing Templates</a></li>
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

          <h3>Printing Templates Tab</h3><hr>
           <form id="printing_tab" name="printing_tab" autocomplete="off" method="POST">
           <input type="hidden" name="user_id3" id="user_id3" value="<?php echo $_SESSION['login_user']; ?>">
            <!-- <input type="text" name="tab3" id="tab3" value="<?php echo $id;?>"> -->
            	<?php 
            		$ss=mysql_query("SELECT * FROM `company` WHERE user_id='$user_id'")or die(mysql_error($connection));
            		$ara=mysql_fetch_array($ss);
            		
            	 ?>
            <div class="col-md-6">
              <div class="col-md-2">
              	<input type="radio" name="inv_print" class="form-control" style="width: 35px; margin: 0 35%;" value="temp1"<?php echo ($ara['print_temp']=='temp1')?'checked':'' ?>>
              </div>
              <div class="col-md-3">
             	<label>Print Template 1</label>
              </div>
              <!-- <div class="panel-body"></div> -->
              <div class="col-md-2">
              	<input type="radio" name="inv_print" value="temp2"<?php echo ($ara['print_temp']=='temp2')?'checked':'' ?> class="form-control" style="width: 35px; margin: 0 35%;">
              </div>
              <div class="col-md-3">
             	<label>Print Template 2</label>
              </div>
           	</div>
           	<div class="col-lg-12" align="center">
				<button name="btn_print" type="submit" class="btn btn-primary" id="btn_print" value="save" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			</div>

           	<div class="col-md-6">
           		<div class="col-md-2"></div>
	           	<div class="col-md-3">
	             	<!-- <label>Print Template 1</label> -->
	             	<img id="myImg" src="images/print1.jpg" style="width:100%;max-width:300px" alt="Print Invoice Template 1">
	            </div>
	            <div class="col-md-2"></div>
			    <div class="col-md-3">
	             	<!-- <label>Print Template 2</label> -->
	             	<img  id="myImg1" src="images/print2.jpg" style="width:100%;max-width:300px" alt="Print Invoice Template 2">
	            </div>
		      	<div id="print_module" class="modal_print" style="z-index: 1031;">
				  <span class="close">&times;</span>
				  <img class="modal-content_print" id="img01">
				  <div id="caption"></div>
				</div>
		    </div>
		    <div class="col-lg-12" align="left">
				<small>Note*:- Selected print template format will be applicable for Invoice, Proforma Invoice and Estimate.</small>
			</div>
		    </form>
			 <script>
				// Get the modal
				var modal = document.getElementById('print_module');

				// Get the image and insert it inside the modal - use its "alt" text as a caption
				var img = document.getElementById('myImg');
				var img1 = document.getElementById('myImg1');
				var modalImg = document.getElementById("img01");
				var captionText = document.getElementById("caption");
				img.onclick = function(){
				    modal.style.display = "block";
				    modalImg.src = this.src;
				    captionText.innerHTML = this.alt;
				}
				img1.onclick = function(){
				    modal.style.display = "block";
				    modalImg.src = this.src;
				    captionText.innerHTML = this.alt;
				}

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() { 
				    modal.style.display = "none";
				}
			</script>

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

// printing template tab module 
$('form#printing_tab').submit(function(e)
{
   e.preventDefault();
       
	$.ajax({
	            url:'insert_print_temp.php',
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
    });

</script>