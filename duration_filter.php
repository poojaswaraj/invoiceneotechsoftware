<?php

include "config.php";

$sel_duration =$_POST['sel_duration'];
$type = $_POST['type'];
$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];
$user_type=$_POST['us_ty'];

$sub=mysql_query("SELECT * FROM user_profile WHERE type='$user_type' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];

if($fromdate=="" && $sel_duration=="" )
  {
  	echo "1";
  }
  else{
?>     
<table id="example" class="datatable table table-striped">
  <thead>
    <tr>
      <th>Sr. No</th>
      <th>Number</th>
	  <th>Customer Name</th>
	  <th>Issue Date</th>
	  <th>Due Date</th>
	  <th>Status</th>
	  <th>Due</th>
	  <th>Total</th>
	  <!-- <th>Type</th> -->
                      
    </tr>
  </thead>
  <tbody>
        <?php
			if($sel_duration=='this-month')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and issue_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));

		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
						$due=$row['due_amt'];

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          	 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				   
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td>: -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>



					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
					  <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
						{
					   ?>
					   <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		<a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>
				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }
			   else if($sel_duration=='last-month')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and  MONTH(issue_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
				// SELECT * FROM common
				// WHERE YEAR(issue_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
				// AND MONTH(issue_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)

		           while($row=mysql_fetch_array($sql))
					{
						$ty=$row['type'];
						$due=$row['due_amt'];
						$del_status=['del_status'];
						$sr_no++;
					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>

				    <!--  <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{	
						
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php

					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					     <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>

				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

			    else if($sel_duration=='last-year')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and  YEAR(issue_date) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));

		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
						$due=$row['due_amt'];
					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					    <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		  <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>

				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

			    else if($sel_duration=='this-year')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and  YEAR(issue_date) = YEAR(CURDATE()) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
						$due=$row['due_amt'];
					if($ty=='Estimate')
					{
			  ?>
		          	<tr>	
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
						{
					   ?>
					    <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>
				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

			    else if($sel_duration=='last-week')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and issue_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND issue_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));

// 		          SELECT id FROM tbl
// WHERE issue_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
// AND issue_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY

		           while($row=mysql_fetch_array($sql))
					{
						$ty=$row['type'];
						$due=$row['due_amt'];
						$sr_no++;

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>

		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					      <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>


				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

			     else if($sel_duration=='lastfive-year')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and issue_date >= DATE_SUB(NOW(), INTERVAL 5 YEAR) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));

				// SELECT * FROM products WHERE issue_date >= sysdate - interval '5' year		       

		           while($row=mysql_fetch_array($sql))
					{
						$ty=$row['type'];
						$due=$row['due_amt'];
						$sr_no++;

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>

		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					    <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		  <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>
				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

			    else if($sel_duration=='this-week')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * FROM common WHERE type='$type' and issue_date >= DATE_SUB(NOW(), INTERVAL 1 WEEK) and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));

				//SELECT * FROM jokes WHERE issue_date > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY score DESC;		       

		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
						$due=$row['due_amt'];

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>




					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					    <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>


				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

		   	else if($fromdate!='' && $todate!='')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='$type' AND  date(issue_date) BETWEEN  '$fromdate' AND '$todate' and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{	
						$sr_no++;
						$ty=$row['type'];
						$due=$row['due_amt'];

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
						{
					   ?>
					   <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>

				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
			    }

				else
			     {
			     	$sr_no=0;
			      $sql =mysql_query("SELECT * From common WHERE type='$type' and user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          while($row=mysql_fetch_array($sql))
					{
						$ty=$row['type'];
						$due=$row['due_amt'];
						$sr_no++;

					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          		<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td>-</td>
					 <td>-</td>
					 <td>-</td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				     <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>


					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
		        <?php
					}
					else if($ty=='Profarma-Invoice')
					{
				?>
					<tr>
					<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				     <!-- <a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
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
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->
					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
						<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td>
				    <!--  <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a> -->
				      <?php 
					  	if($user_type=='admin')
						{
					   ?>
					    <a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
					  <?php 
					 	 }
					 	 else
					 	 {
					   ?>
				  		 <a href="user_dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a>
				   <?php } ?>

				     </td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <!-- <td><?php echo $row['status'];?></td> -->

					  <?php 
				  	if($due==0.00)
						{
				  	 ?>
				  		<td><span style="color: green;"><?php echo $row['status'];?></span></td>
				  <?php }
				  		else{
				   ?>
				  	  	<td><span style="color: red;"><?php echo $row['status'];?></span></td>
				   <?php } ?>
					 <td><?php echo $row['due_amt'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <!-- <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td> -->
		          </tr>
				<?php
					}
			       }
	             }
	          ?>
          </tbody>
</table>    
<?php } ?>          
