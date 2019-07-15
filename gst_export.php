<?php 
$user_id=$_SESSION['login_user'];
$utype=$_SESSION['user_type']=$row['type'];
$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
 ?>
<div class="row" >
<?php 
	if($utype=='admin')
	{
 ?>
	<h3>GST Sales <a href="dashboard.php?page=import_gst" style="float:right;">BACK </a></h3><hr>
<?php 
}
else{
 ?>
 <h3>GST Sales <a href="user_dashboard.php?page=import_gst" style="float:right;">BACK </a></h3><hr>
 <?php } ?>
	<!-- <form id="filter" name="filter" method="post"> -->
<div class="col-lg-12" id="filter"> 
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
<!-- </form> -->
	<div class="col-lg-12" id="reportdata">
       <h4>Recent Sales </h4>
	<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
      	<thead>
       		<tr>
	          <th>Sr.No</th>
	          <th>Issue Date</th>
	          <th>Invoice No</th>
	          <th>Party Name</th>
	          <th>Discription of Product</th>
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
 			$user_id=$_SESSION['login_user'];
        	$sr_no=0;
        	if($utype=='admin')
        	{
        	$sq = mysql_query("SELECT e.sgst,e.cgst,e.igst,e.value,b.base_price,b.reference,c.issue_date,c.number,c.customer_name,c.cust_gst_no,c.invoice_state,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN item_tax d ON a.id=d.item_id INNER JOIN tax e ON e.value=d.tax_value WHERE c.type='Invoice' and c.user_id='$user_id' and a.status=1")or die(mysql_error($connection));
        	}
        	else{
        		$sq = mysql_query("SELECT e.sgst,e.cgst,e.igst,e.value,b.base_price,b.reference,c.issue_date,c.number,c.customer_name,c.cust_gst_no,c.invoice_state,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN item_tax d ON a.id=d.item_id INNER JOIN tax e ON e.value=d.tax_value WHERE c.type='Invoice' and c.user_id='$sub_id' and a.status=1")or die(mysql_error($connection));
        	}
		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$sr_no++;
		  		$id1=$row['id'];
		  		$qty=$row['quantity'];
		  		// $price=$row['base_price'];
		  		$unit_price=$row['unitary_cost'];
		  		$disc_amt=$row['disc_amt'];
		  		$base_amt=$qty*$unit_price;
		  		$base_amount=$base_amt-$disc_amt;
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
	          <td><?php echo $sr_no;?></td>
	          <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
	          <td><?php echo $row['number']; ?></td>
	          <td><?php echo $row['customer_name']; ?></td>
	          <td><?php echo $row['reference']; echo"(".$row['description'].")"; ?></td>
	          <td><?php echo $row['cust_gst_no']; ?></td>
			  <td><?php echo $row['invoice_state']; ?></td>
	          <td><?php echo $row['hsn_code']; ?></td>
	          <td><?php echo $base_amount; ?></td>
	          <?php 

	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.igst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=5 and c.id='$id1'")or die(mysql_error($connection));
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
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=12 and c.id='$id1'")or die(mysql_error($connection));
	          			$arr=mysql_fetch_array($gst);

	          			 $tax = $arr['tax_amt'];
		  				 $a=$tax/2; 
		  				 	// Divide tax into SGST and CGST
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
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=18 and c.id='$id1'")or die(mysql_error($connection));
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
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=28 and c.id='$id1'")or die(mysql_error($connection));
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
	         <?php } ?> 
	          <td><?php echo $row['tax_amt']; ?></td>
	          <td><?php echo $row['price']; ?></td>
	        </tr>
	        <?php } ?>
        </tbody>
      <!--   <h3 style="float: left;">Total Amount:<?php 
			$sq = mysql_query("SELECT e.sgst,e.cgst,e.igst,e.value,b.base_price,b.reference,c.issue_date,c.number,c.customer_name,c.cust_gst_no,c.invoice_state,sum(price)as tt,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN item_tax d ON a.id=d.item_id INNER JOIN tax e ON e.value=d.tax_value WHERE c.type='Invoice' and c.user_id='$user_id' and a.status=1")or die(mysql_error($connection));
			while($rr=mysql_fetch_array($sq))
			{
				echo $rr['tt'];
			}

        ?></h3> -->
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
			  
					    url:'gst_filter.php',
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
        $('#fromDate').datepicker();
        $('#toDate').datepicker();
    })
}
</script>