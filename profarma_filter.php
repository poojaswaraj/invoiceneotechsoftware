<?php

include "config.php";

$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);

  $user_id = $_POST['us_id'];
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
			if($fromdate!='' && $todate!='')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='Profarma-Invoice' AND  date(issue_date) BETWEEN  '$fromdate' AND '$todate' AND user_id='$user_id' and del_status='1' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$cust_id=$row['customer_id'];
						$due=$row['due_amt'];
			  ?>
		          	<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=profarma_incoice&id=<?php echo $row['id'];?>&cust_id=<?php echo $cust_id; ?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
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
					 <!--  <td><a href="dashboard.php?page=profarma_incoice&id=<?php echo $row['id'];?>&cust_id=<?php echo $cust_id; ?>"><?php echo $row['type']; ?></a></td>
					
		          </tr> -->
		        
			    <?php
					
			       }
			    }
			    else
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='Profarma-Invoice' and user_id='$user_id' and del_status='1' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
						$cust_id=$row['customer_id'];
						$due=$row['due_amt'];
			  ?>
		          	<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=profarma_incoice&id=<?php echo $row['id'];?>&cust_id=<?php echo $cust_id; ?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
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
					  <!-- <td><a href="dashboard.php?page=profarma_incoice&id=<?php echo $row['id'];?>&cust_id=<?php echo $cust_id; ?>"><?php echo $row['type']; ?></a></td> -->
					 
		          </tr>
		      <?php
					
			       }
	             }
	          ?>
          </tbody>
</table>    
          
