<?php 
$user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type']; 
$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
?>
<div class="row">
	<h3>Estimates
	<!-- <a href="logestimate.php?us_ty=<?php echo $utype; ?>" style="float:right;">+New Estimate </a></h3><hr> -->
	<?php 
	  	if($utype=='admin')
		{
	   ?>
	<a href="logestimate.php" style="float:right;">+New Estimate </a></h3><hr>
	  <?php 
	 	 }
	 	 else
	 	 {
	   ?>
	  <a href="user_logestimate.php" style="float:right;">+New Estimate </a></h3><hr>
	<?php } ?>
<!-- <form id="filter" name="filter" method="post"> -->
<div class="col-lg-12" id="filter"> 
      <input type="hidden" name="us_id" id="us_id" value="<?php echo $user_id; ?>">

	<div class="col-md-1">
		<label>From Date:-</label>
	</div>
	<div class="col-md-2">
		<input type="date" class="form-control" name="fromDate" id="fromDate">
	</div>
	
	<div class="col-md-1">
		<label>To Date:-</label>
	</div>
	<div class="col-md-2">
		<input type="date" class="form-control" name="toDate" id="toDate" onclick="check()">
		<p id="msg1"></p>
	</div>
	
    <div class="col-md-1">
		<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
	</div>
	
	<!-- <div class="col-md-1">
		<button type="reset" class="btn btn-danger" value="Reset" onclick="reset()">Reset</button>
	</div>
	 -->
</div>
<div class="panel-body"></div>
<!-- </form> -->

	<div class="col-lg-12" id="reportdata">
            <h4>Recent Estimates</h4>
			<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Sr. No</th>
				  <th>Number</th>
				  <th>Customer Name</th>
				  <th>Issue Date</th>
				  <!-- <th>Due Date</th> -->
				  <!-- <th>Status</th> -->
				  <!-- <th>Due</th> -->
				  <th>Total</th>
				  <!-- <th>Type</th> -->
				</tr>
			  </thead>
			  <tbody>
			<?php 
				$sr_no=0;
				if ($utype=='admin') 
				{
					$query = mysql_query("SELECT * FROM common WHERE type='Estimate' and user_id='$user_id'")or die(mysql_error($connection));
				}
				else{
					$query = mysql_query("SELECT * FROM common WHERE type='Estimate' and user_id='$sub_id'")or die(mysql_error($connection));
				}			  
			  		while ($row=mysql_fetch_array($query)) {
			  			$sr_no++;
			?>
				<tr id="invoice-23">
				  <td><?php echo $sr_no;?></td>
				  <td><?php echo $row['number'];?></td>
				  <td>
				  <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				   <?php 
				  	if($utype=='admin')
					{
				   ?>
				  <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				  <?php 
				 	 }
				 	 else
				 	 {
				   ?>
				   <a href="user_dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>
				  </td>
				  <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
				  <!-- <td><?php echo $row['due_date'];?></td> -->
				  <!-- <td><?php echo $row['status'];?></td> -->
				
				  <td><?php echo $row['gross_amount'];?></td>
				  <!-- <td>
				  <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><button id="load-payments-for-23" rel="payments:show" value="<?php echo $row['id'];?>" type="button">Payments</button></a>
				  </td> -->
				</tr>
			<?php } ?>
				
			  </tbody>
			</table>
		</div>
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
		var us_id =$('#us_id').val();

		if(fromDate!="" && toDate=="")
			{
				// alert('Please Select To Date.');
				$('#toDate').css('borderColor','red');
				$('#msg1').html('Please Select To Date.');
				$('#msg1').css('color','red');
			}
			else{
			
			  $.ajax({
			  
				    url:'estimate_filter.php',
				    type:'POST',
				    data:{
					        fromDate:fromDate,
					        toDate:toDate,
					        us_id:us_id
					        
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
						      .order([[0,'desc']])
						      .draw(false);
				    }
			 });

		}
	});
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
        $('#fromDate').datepicker();
        $('#toDate').datepicker();
    })
}
</script>