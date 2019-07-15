<div class="row">
<h3>Customer Flat Booking Details</h3><hr>
	<div class="col-lg-12" id="reportdata">
        <h4>Customer Flat Booking Details</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Payment Date</th>
			  <th>Customer Name</th>
			  <th>Contact No</th>
			  <th>Project Name</th>
			  <th>Flat Details</th>
			  <th>Area</th>
			  <th>Rate</th>
			  <th>Government Charges</th>
			  <th>Other Charges </th>
			  <th>Total Amount</th>
			  <th>Paid Amount</th>
			  <th>Balance Amount</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			  include("config.php");

			  $select=mysql_query("SELECT c.pro_name, a.* FROM `flat_booking` a INNER JOIN new_project c ON c.id=a.pro_id")or die(mysql_error($connection));
			  $sr_no=0;
			  while($userrow=mysql_fetch_array($select))
			   {
		   		  $sr_no++;
		   		  $id=$userrow['id'];
				  $payment_date=$userrow['payment_date'];
				  $cust_name=$userrow['cust_name'];
				  $pro_name=$userrow['pro_name'];
				  $flat_details=$userrow['flat_details'];
				  $area=$userrow['area'];
				  $rate=$userrow['rate'];
				  $gov_charges=$userrow['gov_charges'];
				  $other_charges=$userrow['other_charges'];
				  $amount=$userrow['amount'];
				  $paid_amount=$userrow['paid_amount'];
				  $balance_amount=$userrow['balance_amount'];
			?>
				<tr>
					<td><?php echo $sr_no; ?></td> 
					<td><?php echo $payment_date; ?></td>
					<td><?php echo $cust_name; ?></td>
					<td><?php echo $userrow['cust_cont']; ?></td>
					<td><?php echo $pro_name; ?></td>
					<td><?php echo $flat_details; ?></td>
					<td><?php echo $area; ?></td>
					<td><?php echo $rate; ?></td>
					<td><?php echo $gov_charges; ?></td>
					<td><?php echo $other_charges; ?></td>
					<td><?php echo $amount; ?></td>
					<td><?php echo $paid_amount; ?></td>
					<td><?php echo $balance_amount; ?></td>
				</tr>
			<?php } ?>
		  </tbody>
	
		</table>
	</div>
</div>
