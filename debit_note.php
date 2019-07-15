<?php
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
?>
<div class="row">
	<h3>Debit Notes</h3>
	<!-- <a href="logpurchase.php" style="float:right;">+New Purchase Order </a></h3> -->
	<hr>
<!-- <form id="filter" name="filter" method="post"> -->
<div class="col-lg-12" id="filter"> 
    <input type="hidden" name="us_id" id="us_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="us_ty" id="us_ty" value="<?php echo $utype; ?>">
	<div class="col-md-3">
	<label>From Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="fromDate" id="fromDate" data-placeholder="From Date" required aria-required="true">
	</div>
	
	<div class="col-md-3">
		<label>To Date <span class="required_field">*</span></label>
		<input type="date" class="form-control" name="toDate" id="toDate" data-placeholder="To Date" required aria-required="true" onclick="check()">
		<p id="msg1"></p>
	</div>
	<!-- <div class="col-md-3">
		<label>Project <span class="required_field">*</span></label>
		<select name="sel_pro" id="sel_pro" class="form-control" required="">
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
	</div> -->
	 <div class="col-md-3" style="margin: 25px 0px">
		<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
	</div>   
	<!-- <div class="col-md-1">
		<button type="reset" class="btn btn-danger" value="Reset" onclick="reset()">Reset</button>
	</div> -->
</div>
<div class="panel-body"></div>
<!-- </form> -->

	<div class="col-lg-12" id="reportdata">
        <h4>Debit Note List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Project Name</th>
			  <th>Supplier Name</th>
			  <th>PO No</th>
			  <th>PO Date</th>
			  <th>Base Amount</th>
			  <th>Total Tax Amount</th>
			  <th>Total Amount</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		 <?php 
		  $sr_no=0;
		  
		  $sql = mysql_query("SELECT e.id as deb_id,c.name,b.pro_name, a.* FROM `tbl_po` a LEFT JOIN mst_supplier c ON a.supp_id=c.id LEFT JOIN daily_material_requisition d ON d.id=a.req_id LEFT JOIN new_project b ON a.pro_id=b.id OR d.pro_id=b.id LEFT JOIN tbl_debit e ON a.id=e.po_id ")or die(mysql_error($connection));
		  	while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$po_id = $row['id']; //po_id
		  		 $deb_id = $row['deb_id'];//debit note id
		  	?>

			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['po_no']; ?></td>
			  <td><?php echo $row['po_date']; ?></td>
			  <td><?php echo $row['base_amt']; ?></td>
			  <td><?php echo $row['tax_amt']; ?></td>
			  <td><?php echo $row['grand_total']; ?></td>
			  <td>
			  	<?php if(empty($deb_id)){ ?>
			  	<a href='dashboard.php?page=new_debit_note&id=<?php echo $po_id; ?>' title='Debit Note' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Create Debit Note</button></a>
			  <?php }else{ ?>
			  	<a href='dashboard.php?page=edit_debit_note&id=<?php echo $deb_id; ?>' title='Debit Note' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View Debit Note</button></a>
			  <?php } ?>
			  </td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center">Approval Form</h3>
            </div>
            <div class="modal-body">    
            <form  method="post" id="myform" enctype="multipart/formdata"> 

                <input type="hidden" name="txt_id" id="txt_id">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
				<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
                <div class="col-md-12">
	               <div class="col-md-6">
						<label>Date <span class="required_field">*</span></label>
						<input type="date" name="date" id="txt_date" class="form-control" data-placeholder="Date" required aria-required="true" />
					</div>
					<div class="col-md-6">
					<label>Requisition Made By <span class="required_field">*</span></label>
						<select name="reqi_made_by" id="reqi_made_by" class="form-control" required="">
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
					<select name="sel_project" id="sel_project" class="form-control" required="">
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
						<select name="material_name" id="material_name" class="form-control" required="">
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
					<textarea class="form-control" name="txt_desc" id="txt_desc" placeholder="Description"  readonly=""></textarea>
				</div>
				<div class="col-md-6">
					<label>Unit <span class="required_field">*</span></label>
					<select name="txt_unit" id="txt_unit" class="form-control" required="">
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
						<input type="number" class="form-control" name="txt_qty" id="txt_qty" placeholder="Quantity" required="">
					</div>
					<div class="col-md-6">
						<label>Required By <span class="required_field">*</span></label>
						<input type="date" class="form-control" name="requried_by_date" id="requried_by_date" data-placeholder="Required By" required="">
					</div>
				</div>
				<div class="panel-body"></div>

				<div class="col-md-12">
		            <div class="col-md-6">
						<label>Comment</label>
						<textarea class="form-control" name="txt_comment" id="txt_comment" placeholder="Comment"></textarea>
					</div>
					<div class="col-md-6">
						<label>Approval <span class="required_field">*</span></label>
						<select class="form-control" name="approval" id="approval" required="">
							<option value="">Select One</option>
							<option value="Approved">Approved</option>
							<option value="Pending">Pending</option>
							<option value="Declined">Declined</option>
						</select>
					</div>
				</div>
                
               <div class="panel-body"></div>
           		 <p id="pmsg"></p>   
	            <div class="modal-footer">

	               <button class="btn btn-primary submit" name="submit" id="save">Save</button>
	               <button type="button" class="btn btn-warning btn-md" data-dismiss="modal">Cancel</button>      
		        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
	    $('#material_name').on('change',function(){
	        var id = $(this).val();
	        // alert(id);
	      if(id!=null)
	        {
	          $.ajax({
	                    type:'POST',
	                    url: "get_mate_info.php",
	                    data:{
	                            id:id
	                    },
	                    dataType: "JSON",
	                    success:function(data)
	                    {
	                   		$('#txt_desc').val(data.description);
	                    	$('#txt_unit').val(data.unit);
	                    	$('#avail_qty').val(data.qty);
	                    }
	                }); 
	          }else{
	              $('#material_name').html('Select Material first'); 
	          }
	      });
	});

	function get_data(id){
		var id =id;
		$.ajax({
	                type:'POST',
	                url: "get_approval_detail.php",
	                data:{
	                        id:id
	                },
	                dataType: "JSON",
	                success:function(data)
	                {
		                	console.log(data);
		                	
		                $('#txt_id').val(data.id);
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
	                	
	                }
	            });

	}
</script>

<script>
	function check()
	{

		var toDate=$('#toDate').val();
		if(toDate!=="mm/dd/yyyy")
		   {
			  $('#toDate').css('borderColor','#ccc');
			  $('#msg1').html('');		  
			}
	}
</script>

<script>
$('#search').click(function()
	{
		var fromDate=$('#fromDate').val();
		var toDate=$('#toDate').val();
		var sel_project=$('#sel_pro').val();
		//var material_name=$('#mate_name').val();
		var us_id=$('#us_id').val();
		var us_ty=$('#us_ty').val();

		if(fromDate=="" || toDate=="" )
			{
				alert('Please Select Dates and Project.');
				// $('#toDate').css('borderColor','red');
				// $('#msg1').html('Please Select To Date.');
				// $('#msg1').css('color','red');
			}
			else{
			
			  $.ajax({
			  
				    url:'debit_filter.php',
				    type:'POST',
				    data:{
					        fromDate:fromDate,
					        toDate:toDate,
					        us_id:us_id,
						    us_ty:us_ty,
					       // material_name:material_name

				    },
				    success:function(data)
				    {
				      // alert(data);
				      $('#reportdata').html('');
				      $('#reportdata').html(data);

				      $('#example').DataTable({

						     "dom": 'lBfrtip',
						     "buttons": [
						            {
						                extend: 'collection',
						                text: 'Export',
						                exportOptions: {
						                   columns: [ 0, 1, 2]
						                    
						                },
						                buttons: [
						                    // 'copy',
						                    'excel'
						                    // 'csv',
						                    // 'pdf',
						                    // 'print'
						                ]
						            }
						        ]
						  });
      
					      var table=$('#example').DataTable();
						      table
						      .order([[1,'desc']])
						      .draw(false);
				    }
			 });

		}
	});

$('form#myform').submit(function(e){
 	e.preventDefault();
	$("button#save").button('loading');
	$.ajax({	
				url:'update_mate_reqisition.php',
				type:"POST",
				data: new FormData(this),
                contentType:false,
                cache:false,  
                processData:false,

				success: function(data)
				{
					$("button#save").button('reset');

					if(data==1)
					{
						swal({
							  position: 'top-right',
							      type: 'success',
								  title: 'Done',
								  showConfirmButton: false,
								  timer: 1500
						  })
						  window.setTimeout(function()
						    { 
						      window.location.href= "user_dashboard.php?page=purchase_order";
						 	} ,1500);
		
					}
					else if(data==3)
					{
						swal({
							  position: 'top-right',
							      type: 'success',
								  title: 'Done',
								  showConfirmButton: false,
								  timer: 1500
						  })
						  window.setTimeout(function()
						    { 
						      window.location.href= "dashboard.php?page=purchase_order";
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
    
	 
});
</script>