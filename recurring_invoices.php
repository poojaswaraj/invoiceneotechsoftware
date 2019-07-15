<div class="row">

	<h3>Recurring Invoices
	<a href="logrecurring.php" style="float:right;">+New Recurring Invoice</a></h3><hr>

	<!-- <form id="filter" name="filter" method="post"> -->
<div class="col-lg-12" id="filter"> 
   
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
            <h4>Recent Recurring Invoices</h4>
			<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Sr. No</th>
				  <th>Number</th>
				  <th>Customer Name</th>
				  <th>Date</th>
				  <th>Due Date</th>
				  <th>Status</th>
				  <th>Due</th>
				  <th>Total</th>
				  <!-- <th>Type</th> -->
				</tr>
			  </thead>
			  <tbody>
			<?php 
				$sr_no=0;
			  	$query = mysql_query("SELECT * FROM common WHERE type='Recurring'")or die(mysql_error($connection));

			  		while ($row=mysql_fetch_array($query)) {
			  			$sr_no++;
			  			$due=$row['due_amt'];
			?>
				<tr id="invoice-23">
					<td><?php echo $sr_no;?></td>
				  <td><?php echo $row['number'];?></td>
				  <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
				  <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
				  <td><?php echo $row['due_date'];?></td>
				  <!-- <td><?php echo $row['status'];?></td> -->

				   <?php 

				  	if($due==0.00)
						{
				  	 ?>
				  <td><span style="color: green;">Close</span></td>
				  <?php }
				  		else{
				   ?>
				    <td><span style="color: red;">Pending</span></td>
				   <?php } ?>

				  <td><?php echo $row['due_amt'];?></td>
				  <td><?php echo $row['gross_amount'];?></td>
				  <!-- <td> -->
				  <!-- <button class="btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal" onclick="$('#invoice_id').val('<?php echo $data['id'];?>');">Payments</button> -->
				  <!-- </td> -->
				</tr>
				<?php } ?>
				
			  </tbody>
			</table>
		</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="1" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" align="center">Payment Here</h3>
            </div>
            <div class="modal-body">    
                <form  method="post" id="myform" enctype="multipart/formdata"> 

                <input type="hidden" name="invoice_id" id="invoice_id">
                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Date:</h4><input type="date" class="form-control" name="txt_date" id="txt_date" placeholder="Date"  /></div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                </div> 

                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Amount:</h4><input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"></div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                </div> 

                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Description:</h4><input type="text" class="form-control" name="txt_desc" id="txt_desc" placeholder="Description"></div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                </div>
           
                <br>
              
	            <div class="modal-footer">
	               <button class="btn btn-primary submit" name="submit" id="save">Save</button>
	               <button type="button" class="btn btn-warning btn-md" data-dismiss="modal">Cancel</button>      
		        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Insert Script -->
<script>
$('form#myform').submit(function(e){

        e.preventDefault();

          $('button#save').button('loading');
            $.ajax({

                    url:'payments.php',
                    type: "POST",
                    data: new FormData(this),
                    contentType:false,
                    processData:false,
                    success: function(data)
                    {
                        // alert(data);
                        $('button#save').button('reset');
                        if(data==1)
                        {
                          // alert("Payment Successfully..");
                          // location.reload();
                          swal({
									  position: 'top-right',
	 							      type: 'success',
	  								  title: 'Payment Successfully!!!',
	  								  showConfirmButton: false,
	  								  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
 										location.reload();
 								 	} ,1500);
                        }
                        else if(data==2){

                            alert("Error");
                        }
                        
                    }
            });

    });

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
	
		if(fromDate!="" && toDate=="")
			{
				// alert('Please Select To Date.');
				$('#toDate').css('borderColor','red');
				$('#msg1').html('Please Select To Date.');
				$('#msg1').css('color','red');
			}
			else{
			
			  $.ajax({
			  
				    url:'recurring_filter.php',
				    type:'POST',
				    data:{
					        fromDate:fromDate,
					        toDate:toDate
					        
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
						                    'excel',
						                    'csv',
						                    'pdf',
						                    'print'
						                ]
						            }
						        ]
						  });
      
					      var table=$('#example').DataTable();
						      table
						      .order([[2,'desc']])
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