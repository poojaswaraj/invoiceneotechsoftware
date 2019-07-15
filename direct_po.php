<?php 
$user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
?>
<div class="row">
	<h3>New PO List
		<a href="logpurchase.php" style="float:right;">+New Purchase Order </a></h3>
	<hr>
<!-- /.panel-heading -->
	<div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li ><a href="dashboard.php?page=requisition_po">Requisition PO List</a></li>
        <li class="active"><a href="dashboard.php?page=direct_po">New PO List</a></li>
    </ul>
    <div class="panel-body"></div>

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

		<div class="col-md-3">
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
		</div>
		<div class="col-md-3">
			<label>Supplier Name</label>
				<select name="supp_name" id="supp_name" class="form-control">
				<option value="">Select Supplier</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_supplier")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
					<option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="panel-body"></div>
	    <div class="col-md-12" style="float: right;">
			<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
		</div>

	</div>
<div class="panel-body"></div>
    
<!-- Tab panes -->
<div class="tab-content">
	<!-- Tab 1 -->
    <div class="tab-pane fade in active" id="series">
       	<!-- Tab 2 -->
           
     <div class="col-lg-12" id="reportdata">
        <h4>New PO List</h4>
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
		  	// if($utype=='admin'){
		  		$sql = mysql_query("SELECT c.name,b.pro_name, a.* FROM `tbl_po` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id")or die(mysql_error($connection));
		  	// }else{
		  	// 	$sql = mysql_query("SELECT c.name,b.pro_name, a.* FROM `tbl_po` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id")or die(mysql_error($connection));
		  	// }
		  	
		  	while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
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
			  <?php if($utype=='admin'){ ?>
				<a href='dashboard.php?page=edit_new_purchase&id=<?php echo $id; ?>' title='View PO' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View PO</button></a>
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=edit_new_purchase&id=<?php echo $id; ?>' title='View PO' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View PO</button></a>
			  <?php } ?> 
			  </td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>


		 </div>
		</div>
	
	</div>
<!-- /.panel-body -->
</div>

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
		var supp_name=$('#supp_name').val();
		var us_id=$('#us_id').val();
		var us_ty=$('#us_ty').val();

		if(fromDate=="" || toDate=="" || sel_project=="")
			{
				alert('Please Select Dates and Project.');
				// $('#toDate').css('borderColor','red');
				// $('#msg1').html('Please Select To Date.');
				// $('#msg1').css('color','red');
			}
			else{
			
			  $.ajax({
			  
				    url:'direct_po_filter.php',
				    type:'POST',
				    data:{
					        fromDate:fromDate,
					        toDate:toDate,
					        sel_project:sel_project,
					        us_id:us_id,
						    us_ty:us_ty,
					        supp_name:supp_name

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
</script>