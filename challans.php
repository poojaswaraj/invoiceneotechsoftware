<?php
    if(isset($_GET["id"]))
    {
       $id = $_GET["id"];
?>
<div class="row">
	<h3>Invoices
		<a  href="logchallan.php" style="float:right;"> + New Challan</a></h3><hr>
	
	<div class="col-lg-12">
            <h4>Recent Invoices</h4>
			<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th></th>
				  <th>Sr. No</th>
				  <th>Number</th>
				  <th>Customer Name</th>
				  <th>Date</th>
				  <th>Due Date</th>
				  <th>Status</th>
				  <th>Due</th>
				  <th>Total</th>
				  <th>Type</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			  	$sr_no=0;
      		 	$query = mysql_query("SELECT * FROM common WHERE customer_id='$id' and `type`='Challan'")or die(mysql_error($connection));
					while($data=mysql_fetch_array($query))
					{
						$sr_no++;
						$id1=$data['id'];
						$due=$data['due_amt'];
						$amt=$data['gross_amount'];
			   ?>
				<tr id="invoice-23">
					<td><input type="checkbox" name="check"></td>
				  <td><?php echo $data['id'];?></td>

				  <td><?php echo $data['number'];?></td>
				  <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $data['id'];?>"><?php echo $data['customer_name'];?></a></td>
				  <!-- <td><?php echo $data['created_at'];?></td> -->
				  <td><?php echo date('Y-m-d', strtotime($data['created_at']));?></td>
				  <td><?php echo $data['due_date'];?></td>

				   <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><div class="row" style="background-color: #03a9f4; color: white;  border-radius: 5px; padding: 3px; width: 130; height: 25px; ">Closed</div></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><div class="row" style="background-color: #ff9800; color: white; border-radius: 5px; padding: 3px; width: 130; height: 25px;">Pending</div></td>
				   <?php } ?>

				  <td><?php echo $data['due_amt'];?></td>
				  <td><?php echo $data['gross_amount'];?></td>
				    <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  	<td>
				  	  <button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');" disabled><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					  <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $data['id']; ?>" id="inv_id" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				  <?php }
				  		else if($amt==$due){
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $data['id'];; ?>" id="inv_id" class="btn btn-sm btn-info" disabled><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>

				  <?php }
				  		else{
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $data['id'];; ?>" id="inv_id" class="btn btn-sm btn-info" ><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				   <?php } ?>
				</tr>
				<?php
					}
			   ?>
			  </tbody>
			</table>
		</div>
</div>
<?php 
 }
else{
?>
<div class="row" >
	<h3>Challans
		<a  href="logchallan.php" style="float:right;"> + New Challan</a></h3><hr>
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
            <h4>Recent Challans</h4>

        <!-- <form id="frm_delete" action="multiple_delete.php" name="frm_delete" autocomplete="off" method="POST" > -->
		<form name="frmUser" method="post" action="">
			<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Sr. No</th>
				  <th></th>
				  <th>Challan No</th>
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
			  	$i=0;

			  	$query = mysql_query("SELECT * FROM common WHERE type='Challan'")or die(mysql_error($connection));

			  		while ($row=mysql_fetch_array($query)) 
			  		{
			  			if($i%2==0)
						$classname="evenRow";
						else
						$classname="oddRow";

			  			$sr_no++;
			  			$id1=$row['id'];
			  			$due=$row['due_amt'];
			  			$amt=$row['gross_amount'];

			   ?>
				<tr id="invoice-23" class="<?php if(isset($classname)) echo $classname;?>">
				  <!-- <td><input type="checkbox" name="check[]" id="check[]"></td> -->
				   <td><?php echo $sr_no;?></td>
				 <td><input type="checkbox" name="users[]" value="<?php echo $row["id"]; ?>" ></td>
				 
				  <td><?php echo $row['number'];?></td>
				  <td><a href="dashboard.php?page=edit_challan&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
				  <!-- <td><?php echo $row['created_at'];?></td> -->
				  <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
				  <td><?php echo $row['due_date'];?></td>
				  <!-- <td><?php echo $row['status'];?></td> -->
				   <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><div class="row" style="background-color: #03a9f4; color: white;  border-radius: 5px; padding: 3px; width: 130; height: 25px; ">Closed</div></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><div class="row" style="background-color: #ff9800; color: white; border-radius: 5px; padding: 3px; width: 130; height: 25px;">Pending</div></td>
				   <?php } ?>

				  <td><?php echo $row['due_amt'];?></td>
				  <td><?php echo $row['gross_amount'];?></td>

			
				   <!--  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  	<td>
				  	  <button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');" disabled><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					  <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id1; ?>" id="inv_id" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				  <?php }
				  		else if($amt==$due){
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id1; ?>" id="inv_id" class="btn btn-sm btn-info" disabled><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>

				  <?php }
				  		else{
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id1;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id1; ?>" id="inv_id" class="btn btn-sm btn-info" ><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				   <?php } ?> -->
				  
				</tr>
				<?php } ?>
			  </tbody>

			  	<tr class="listheader">
				  <td colspan="2">
					<!-- <input type="button" class="btn-primary" name="delete" value="Generate Invoice"  onClick="setDeleteAction();" /> -->

					<button name="muldel" id="muldel" class="btn btn-sm btn-primary" onClick="generateInvoice();"  ><span class="icon fa fa-money"></span>&nbsp;Generate Invoice</button>
				   </td>
				</tr>
			</table>
			 	
			</form>
		</div>
</div>
<?php } ?>

<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content"> 

         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="diss()">×</button> 
             <h4 class="modal-title" style="text-align:center;">
              Payment Details
             </h4> 
         </div> 
         <div class="modal-body"> 
             <div id="dynamic-content"> <!-- mysql data will load in table -->
                 <div class="row"> 
                     <div class="col-md-12"> 
	                    <div class="table-responsive">
	                     <table id="table" style=".hidden{display:none;}" class="table table-striped table-bordered">
		                     <tr>
		                     <th>Date</th>
		                     <th>Amount</th>
		                     <th>Payment Mode</th>
		                     </tr>
	                     </table>
	                    </div>
	                 </div> 
                 </div>
             </div> 
         </div> 
           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="diss()">Close</button>  
       </div>  
              
      </div> 
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
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Date:</h4><input type="date" class="form-control" name="txt_date" id="txt_date"  placeholder="Date"  required="" /></div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                </div> 

                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Amount:</h4><input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required=""></div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                </div> 

                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Description:</h4><input type="text" class="form-control" name="txt_desc" id="txt_desc" placeholder="Description" required=""></div>
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

<script type="text/javascript">
function generateInvoice() 
{
	// if(confirm("Are you sure want to delete these rows?"))
	//  {
		document.frmUser.action = "dashboard.php?page=genrate_invoice";
		document.frmUser.submit();
	// }
}
</script>

<script>
 	
 $(document).ready(function(){
 
 $(document).on('click', '#inv_id', function(e){
  
  e.preventDefault();
  
  var uid = $(this).data('id'); // get id of clicked row
  
  $('#dynamic-content').hide(); // hide dive for loader
  
  $.ajax({
      url: 'get_payment_details.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'json'
  })
  .done(function(data){

      console.log(data);
   	$('#dynamic-content').hide(); // hide dynamic div
	$('#dynamic-content').show(); //

		 if(data){

                var len = data.length;
                var txt = "";
                if(len > 0){
                    for(var i=0;i<len;i++){
                        if(data[i].date && data[i].amount && data[i].notes){
                          txt += "<tr><td>"+data[i].date+"</td><td>"+data[i].amount+"</td><td>"+data[i].notes+"</td></tr>";
                        }
                    }
                    if(txt != ""){
                        $("#table").append(txt).removeClass("hidden");
                    }
                }
            }

  })
  .fail(function(){
      $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
  });
  
 });
 
});

function diss()
{
	location.reload();
}
</script>

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
			
		    $.ajax({	
			  
					    url:'invoice_filter.php',
					    type:'POST',
					    data:{
						        fromDate:fromDate,
						        toDate:toDate
						        // type:type
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
							      // .order([[2,'desc']])
							      // .draw(false);
					    }
					});

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