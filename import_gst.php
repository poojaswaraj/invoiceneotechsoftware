<?php
 $user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type'];
$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
	if($id = isset($_GET['id']) ? $_GET['id'] : '')
	{
		$query=mysql_query("SELECT b.tax_value,a.* FROM gst_purches a INNER JOIN purches_tax b ON a.id=b.purches_id  where a.id=$id");
		$data=mysql_fetch_array($query);
	}
	else{
		
		$data['invoice_no']="";
		$data['party_name']="";
		$data['gst_no']="";
		$data['state']="";
		$data['hsn_code']="";
		$data['basic_amt']="";
		$data['tax_amt']="";
		$data['total_amt']="";
		$data['tax_value']="";
		$data['cheque_date']="";
		$data['cheque_no']="";
		$data['head_desc']="";
		$data['mode']="";
	}
?>

<div class="row">
<?php 
	if($utype=='admin')
	{
 ?>
	<h3>GST Purchase <a href="dashboard.php?page=gst_export" style="float:right;"> + GST Sales </a></h3>
<?php 
}
else{
 ?>
 	<h3>GST Purchase <a href="user_dashboard.php?page=gst_export" style="float:right;"> + GST Sales </a></h3>
 <?php } ?>
 <hr>
 <div class="col-lg-12" id="filter"> 
    <input type="hidden" name="us_id" id="us_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="us_ty" id="us_ty" value="<?php echo $utype; ?>">
	<div class="col-md-1">
		<label><!-- <span style="color: red; font-size: 20px;">*</span> -->From Date:-</label>
	</div>
	<div class="col-md-2">
		<input type="date" class="form-control" name="fromDate" id="fromDate">
	</div>
	
	<div class="col-md-1">
		<label><!-- <span style="color: red; font-size: 20px;">*</span> -->To Date:-</label>
	</div>
	<div class="col-md-2">
		<input type="date" class="form-control" name="toDate" id="toDate" onclick="check()">
		<p id="msg1"></p>
	</div>
	<div class="col-md-1">
		<label>GST Category:-</label>
	</div>
	<div class="col-md-2">
		<select class="form-control" name="sel_tax" id="sel_tax">
			<option value="">Select Tax</option>
			<?php 
				$array = mysql_query("SELECT * FROM tax")or die(mysql_error($connection));
				while($arr=mysql_fetch_array($array))
				{
			 ?>
			 <option value="<?php echo $arr["value"];?>"><?php echo $arr["name"];?> @ <?php echo $arr["value"];?>%</option>
			 <?php } ?>
		 </select>
	</div>

    <div class="col-md-1">
		<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
		<p id="msg"></p>
	</div>
	
</div>
	
	<div class="panel-body"></div>

<div class="col-md-12" id="reportdata">
  <h4>Recent Purchase</h4>
    <table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
      	<thead>
       		<tr>
	          <th>Sr.No</th>
	          <th>Expense Date</th>
	          <th>Invoice No</th>
	          <th>Party Name</th>
			  <th>GST No</th>		  
			  <th>State</th>
			  <th>HSN/SAC</th>
			  <th>Basic Amount</th>
			  <th>CGST@ 2.5%</th>
			  <th>SGST@ 2.5%</th>
			  <th>IGST@ 5%</th>
			  <th>CGST@ 6%</th>
			  <th>SGST@ 6%</th>
			  <th>IGST@ 12%</th>
			  <th>CGST@ 9%</th>
			  <th>SGST@ 9%</th>
			  <th>IGST@ 18%</th>
			  <th>CGST@ 14%</th>
			  <th>SGST@ 14%</th>
			  <th>IGST@ 28%</th>
			  <th>Total Tax</th>
			  <th>Total Amount</th>
        	</tr>
        </thead>
        <tbody>
        <?php 
        	$sr_no=0;
        	if($utype=='admin')
        	{
        	$query = mysql_query("SELECT * FROM `expenses` WHERE user_id='$user_id' and is_return='Yes' ")or die(mysql_error($connection));
        	}
        	else{
        		$query = mysql_query("SELECT * FROM `expenses` WHERE user_id='$sub_id' and is_return='Yes' ")or die(mysql_error($connection));
        	}
        	while($row=mysql_fetch_array($query))
        	{
        		$sr_no++;
        		$id=$row['id'];

        		if($utype=='admin')
				{
			  	$sql111 = mysql_query("SELECT * FROM company where user_id='$user_id'")or die(mysql_error($connection));
			  }
			  else{
			  	$sql111 = mysql_query("SELECT * FROM company where user_id='$sub_id'")or die(mysql_error($connection));
			  }
                        $res = mysql_fetch_array($sql111);
                        $code=$res['state_code'];
						$cod=$row['state_code'];
         ?>
        	<tr>
        	<!-- <td><?php echo "<a href='dashboard.php?page=import_gst&id=".$row['id']."'>";?><span class="icon fa fa-edit"></span></a></td> -->
	          <td><?php echo $sr_no; ?></td>
	          <td><?php echo $row['pur_date']; ?></td>
	          <td><?php echo $row['invoice_no']; ?></td>
	          <td><?php echo $row['party_name']; ?></td>
	          <td><?php echo $row['gst_no']; ?></td>
	          <td><?php echo $row['state']; ?></td>
	          <td><?php echo $row['hsn_code']; ?></td>
	          <td><?php echo $row['basic_amt']; ?></td>
        <?php 
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=5 and c.id='$id'")or die(mysql_error($connection));
      			$arr=mysql_fetch_array($gst);
      			$tax = $arr['tax_amt'];
  				 $a=$tax/2; 	// Divide tax into SGST and CGST
       			if ($code==$cod) {
	           ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
	      <?php 
	      	}
	      	else{
	       ?>
	            <td>0</td>
	            <td>0</td>
	           <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	    <?php 
			}
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=12 and c.id='$id'")or die(mysql_error($connection));
      			$arr=mysql_fetch_array($gst);
      			$tax = $arr['tax_amt'];
  				 $a=$tax/2; 	// Divide tax into SGST and CGST
       		if ($code==$cod) {
	    ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
      <?php 
	      	}
	      	else{
       ?>
            <td>0</td>
            <td>0</td>
            <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	    <?php 
			}
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=18 and c.id='$id'")or die(mysql_error($connection));
      			$arr=mysql_fetch_array($gst);
      			$tax = $arr['tax_amt'];
  				 $a=$tax/2; 	// Divide tax into SGST and CGST
        	if ($code==$cod) {
	    ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
          <?php 
          	}
          	else{
           ?>
	            <td>0</td>
	            <td>0</td>
	           <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	    <?php 
			}
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=28 and c.id='$id'")or die(mysql_error($connection));
      			$arr=mysql_fetch_array($gst);
      			$tax = $arr['tax_amt'];
  				 $a=$tax/2; 	// Divide tax into SGST and CGST
       		if ($code==$cod) {
	    ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
          <?php 
          	}
          	else{
           ?>
	            <td>0</td>
	            <td>0</td>
	           <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	    <?php 
			}
		?>
	          <td><?php echo $row['tax_amt']; ?></td>
	          <td><?php echo $row['total_amt']; ?></td>
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
		var us_id=$('#us_id').val();
		var us_ty=$('#us_ty').val();
		var sel_tax=$('#sel_tax').val();

		if(fromDate!='' && toDate!='')
		{

		    $.ajax({	
			  
					    url:'purchase_filter.php',
					    type:'POST',
					    data:{
						        fromDate:fromDate,
						        toDate:toDate,
						        us_id:us_id,
						        us_ty:us_ty,
						        sel_tax:sel_tax
					    },
					    success:function(data)
					    {
					      // alert(data);
					      $('#reportdata').html('');
					      $('#reportdata').html(data);

					      $('#example').DataTable({

					      		 "scrollX": true,
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
		   	 $('#msg').html('');
		}
		else{
				$('#msg').html('Please Select Date First');
				$('#msg').css('color','red');

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
        $('#pur_dt').datepicker();
       
    })
}
</script>