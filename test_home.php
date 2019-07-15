<?php 
 $user_id=$_SESSION['login_user'];
 $utype=$_SESSION['user_type']=$row['type']; 
 $sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
?>
<div class="row">
        <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-7 five-three">
            <div class="row">
              <div class="col-sm-4">
               <div class="small-box" style="background-color: aqua;">
                    <div class="inner">
                    
                        <h3>47</h3>
                        <p>Total Sales</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <div class="col-sm-4">
                   <div class="small-box" style="background-color: green;">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Net Sales</p>
                    </div>
                        <div class="icon">
                            <i class="fa fa-cog fa-spin"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
              </div>
             
             
              <div class="col-sm-4">
                   <div class="small-box" style="background-color: orange;">
                    <div class="inner">
                        <h3>45</h3>
                        <p>Taxes</p>
                    </div>
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
              </div><!-- end inner row -->
            </div>
          </div>
          
          <div class="col-sm-5 five-two">
            <div class="row">
              <div class="col-sm-6" style="padding-left: 25px;">
                 <div class="small-box bg-red" style="background-color: red;">
                    <div class="inner">
                        <h3>11</h3>
                        <p>Due</p>
                    </div>
                        <div class="icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
              </div>
              <div class="col-sm-6">
                 <div class="small-box bg-green" style="background-color: green;">
                    <div class="inner">
                        <h3>12</h3>
                        <p>Receipts</p>
                    </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
              </div>
            </div><!-- end inner row -->
          </div>
        </div><!-- end outer row -->
        </div>
        
    </div>

<div class="row">
<!-- <form id="filter" name="filter" method="post"> -->
<div class="col-lg-12" id="filter"> 
    
    <div class="col-md-2">
		<select class="form-control" name="type" id="type" >
			<option value="" >Select Type</option>
			<option value="Estimate">Estimates</option>
			<option value="Invoice">Invoices</option>
			<option value="Profarma-Invoice">Proforma Invoices</option>			
			<!-- <option value="Recurring">Recurring Invoices</option> -->
			
		</select>
		<p id="msg"></p>
	</div>
	 <input type="hidden" name="us_id" id="us_id" value="<?php echo $user_id; ?>">
	 <input type="hidden" name="us_ty" id="us_ty" value="<?php echo $utype; ?>">

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
		<input type="date" class="form-control" name="toDate" id="toDate" onclick="check()" >
		<p id="msg1"></p>
	</div>
	
	<div class="col-md-2" >
		<select class="form-control" name="sel_duration" id="sel_duration">
			<option value="">Select Period</option>
			<option value="this-week">This Week</option>
			<option value="last-week">Last Week</option>
			<option value="this-month">This Month</option>
			<option value="last-month">Last Month</option>
			<option value="this-year">This Year</option>
			<option value="last-year">Last Year</option>
			<option value="lastfive-year">Last 5 Years</option>
		</select>
		<!-- <p id="errmsg"></p> -->
	</div>
	<div class="col-md-1">
		<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
	</div>
	<div class="col-md-1">
		<button type="reset" class="btn btn-danger" value="Reset" onclick="reset()">Reset</button>
	</div>
 
</div>
<div class="panel-body"></div>
<!-- </form> -->
	<div class="col-md-12">
		<div class="col-md-3">
		
            <table class="panel panel-default text-center" border="1">
			  <tbody>
			  	<?php 
			  	if($utype=='admin')
			  	{
			  	$query = mysql_query("SELECT  SUM(gross_amount) as Total, SUM(due_amt) as Due FROM common WHERE type='Invoice' and user_id='$user_id'")or die(mysql_error($connection));
			  }
			  else{
			  		$query = mysql_query("SELECT  SUM(gross_amount) as Total, SUM(due_amt) as Due FROM common WHERE type='Invoice' and user_id='$sub_id'")or die(mysql_error($connection));
			  }
			  	while ($row=mysql_fetch_array($query)) {
			  
			   ?>
				<tr>
				  <td><b>Receipts:</b></td>
				  <td id="receipts"><?php echo"Rs.".$row['Total']; ?></td>
				</tr>
				<tr>
				  <td><b>Due:</b><br /></td>
				  <td id="due"><?php echo "Rs.".$row['Due']; ?></td>
				</tr>
				<!-- <tr>
				  <td>Overdue</td>
				  <td id="overdue"><?php echo "Rs.".$row['Overdue']; ?></td>
				</tr> -->
				<?php } ?>
			  </tbody>
			</table>
		</div>
		<!-- <div class="col-md-3">
			<table class="panel panel-default text-center" border="1">
			  <tbody>
			  	<?php 
			  
			  	$query = mysql_query("SELECT SUM(a.tax_amt) as tax_amt FROM `item` a inner join item_tax b on a.id=b.item_id inner join tax c on b.tax_value=c.value where c.value=5")or die(mysql_error($connection));
			  	while($row=mysql_fetch_array($query))
			  	{

			   ?>
			  	<tr>
				  <td>GST 5%</td>
				  <td id="receipts"><?php echo"Rs.".$row['tax_amt']; ?></td>
				</tr>
				<?php 
			  		}
			  	$query = mysql_query("SELECT SUM(a.tax_amt) as tax_amt FROM `item` a inner join item_tax b on a.id=b.item_id inner join tax c on b.tax_value=c.value where c.value=12")or die(mysql_error($connection));
			  	while($row=mysql_fetch_array($query))
			  	{

			   ?>
				<tr>
				  <td>GST 12%</td>
				  <td id="receipts"><?php echo"Rs.".$row['tax_amt']; ?></td>
				</tr>
				<?php } ?>
			  </tbody>
			</table>
		</div>
		 <!-- <div class="col-md-3" id="div">
		
            <table class="panel panel-default text-center" border="1">
			  <tbody>
				
				<?php 
			  	$query = mysql_query("SELECT SUM(a.tax_amt) as tax_amt FROM `item` a inner join item_tax b on a.id=b.item_id inner join tax c on b.tax_value=c.value where c.value=18")or die(mysql_error($connection));
			 	 	while($row=mysql_fetch_array($query))
			  	{
			   ?>
				<tr>
				  <td>GST 18%</td>
				  <td id="receipts"><?php echo"Rs.".$row['tax_amt']; ?></td>
				</tr>
				<?php 
				  }
			  	$query = mysql_query("SELECT SUM(a.tax_amt) as tax_amt FROM `item` a inner join item_tax b on a.id=b.item_id inner join tax c on b.tax_value=c.value where c.value=28")or die(mysql_error($connection));
			  	while($row=mysql_fetch_array($query))
			  	{

			   ?>
				<tr>
				  <td>GST 28%</td>
				  <td id="receipts"><?php echo"Rs.".$row['tax_amt']; ?></td>
				</tr>
			<?php } ?>
			  </tbody>
			</table>
		</div>  -->
		<div class="col-md-3">
		
            <table class="panel panel-default text-center" border="1">
			  <tbody>
			  	<?php 
			  	if ($utype=='admin') 
			  	{
			  		$query = mysql_query("SELECT SUM(gross_amount) as Total, SUM(net_amount) as net,SUM(tax_amount) as tax FROM common WHERE type='Invoice' and user_id='$user_id'")or die(mysql_error($connection));
			  	}
			 	else{
			 		$query = mysql_query("SELECT SUM(gross_amount) as Total, SUM(net_amount) as net,SUM(tax_amount) as tax FROM common WHERE type='Invoice' and user_id='$sub_id'")or die(mysql_error($connection));
			 	}

			  		while ($row=mysql_fetch_array($query)) {
			   ?>
				<tr>
				  <td><b>Total Sales:</b></td>
				  <td id="receipts"><?php echo "Rs.".$row['Total']; ?></td>
				</tr>
				<tr>
				  <td><b>Net Sales:</b><br /></td>
				  <td id="due"><?php echo "Rs.".$row['net']; ?></td>
				</tr>
				<tr>

				  <td><b>Taxes:</b></td>
				  <td id="overdue"><?php echo "Rs.".$row['tax']; ?>
				  
				  </td>
				</tr>
				<?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

		<div class="row" id="reportdata">
            <h4>Recent Invoice</h4>
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
				  <th>Type</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			  	$sr_no=0;
			  	if($utype=='admin')
			  	{
			  		$query = mysql_query("SELECT * FROM common WHERE type='Invoice' and user_id='$user_id'")or die(mysql_error($connection));
			  	}
			  	else
			  	{
			  		$query = mysql_query("SELECT * FROM common WHERE type='Invoice' and user_id='$sub_id'")or die(mysql_error($connection));
			  	}

			  		while ($row=mysql_fetch_array($query)) {
			  			$sr_no++;
			  			$id=$row['id'];
			  			$due=$row['due_amt'];
			  			$amt=$row['gross_amount'];
			   ?>
				<tr id="invoice-23">
				<td><?php echo $sr_no;?></td>
				  <td><?php echo $row['number'];?></td>
				  <td>
				  <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				  <?php 
				  	if($utype=='admin')
					{
				   ?>
				  	<a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				  <?php 
				 	 }
				 	 else
				 	 {
				   ?>
				  	<a href="user_dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>
				  </td>
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
				  
				   <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  	<td>
				  	  <button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id;?>');" disabled><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					  <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id; ?>" id="inv_id" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				  <?php }
				  		else if($amt==$due){
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id; ?>" id="inv_id" class="btn btn-sm btn-info" disabled><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>

				  <?php }
				  		else{
				   ?>
				  <td>
					<button class="btn btn-sm btn-primary" id="load-payments-for-23" rel="payments:show" type="button" data-toggle="modal" data-target="#myModal"  onclick="$('#invoice_id').val('<?php echo $id;?>');"><span class="icon fa fa-money"></span>&nbsp;Payments</button>

					 <button data-toggle="modal" data-target="#myModal1" data-id="<?php echo $id; ?>" id="inv_id" class="btn btn-sm btn-info" ><i class="glyphicon glyphicon-eye-open"></i> View</button>
				  </td>
				   <?php } ?>
				</tr>
				<?php } ?>
			  </tbody>
			 
			</table>
		</div>

<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content"> 

         <div class="modal-header"> 
             <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="diss()">×</button>  -->
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
                 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
				<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
                 <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-8 col-md-8 col-lg-8"><h4>Date:</h4><input type="date" class="form-control" name="txt_date" id="txt_date" placeholder="Date" required="" /></div>
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

	function reset()
	{
		// $("#filter").load(' #filter');
		location.reload();
	}
</script>


<script>
$('#search').click(function()
{
	var fromDate=$('#fromDate').val();
	var toDate=$('#toDate').val();
	var type=$('#type').val();
	var sel_duration = $('#sel_duration').val();
	var us_id=$('#us_id').val();
	var us_ty=$('#us_ty').val();

	if(type!=null && sel_duration!=null)
		{
		  if(fromDate!=null && toDate!=null)
			{
			  if(type=="")
				{
					$('#type').css('borderColor','red');
					$('#msg').html('Please Select Type');
				    $('#msg').css('color','red');
				}
				// else if(toDate=="")
				//     {
				//     	$('#type').css('borderColor','#ccc');
				// 	    $('#msg').html('');

				//     	 $('#toDate').css('borderColor','red');
				// 	     $('#msg1').html('Please Select Date');
				//       $('#msg1').css('color','red');
				//     }

				    else{

						  	 $.ajax({
									    url:'duration_filter.php',
									    type:'POST',
									    data:{
										        sel_duration:sel_duration,
										        fromDate:fromDate,
										        toDate:toDate,
										        us_id:us_id,
										        us_ty:us_ty,
										        type:type
									    },
									    success:function(data)
									    {
									      // alert(data);

									      if(data==1)
									      {
									        // alert('Please Select Date Or Period');
									        swal(
												  'Oops...',
												  'Please Select Date Or Period!',
												  'error'
												)
									      }
									      else{
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
									    }

								    });

			  	 	$('#type').css('borderColor','#ccc');
					$('#msg').html('');

				    $('#toDate').css('borderColor','#ccc');
				    $('#msg1').html('');
 					
			  	}
			}
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
         $('#txt_date').datepicker();
    })
}
</script>