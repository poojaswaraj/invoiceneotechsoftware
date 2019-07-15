<?php

include "config.php";

  // $fromdate =$_POST['fromDate'];
  // $todate =$_POST['toDate'];
  $type = $_POST['type'];
  $fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);

?>     
<table id="example" class="datatable table table-striped">
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
			if($fromdate!='' && $todate!='')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='$type' AND  date(created_at) BETWEEN  '$fromdate' AND '$todate' ORDER BY created_at DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;

						$ty=$row['type'];
					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          	 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>

		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
					 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>
				<?php
					}
			       }
			    }
				else
			     {
			     	$sr_no=0;
			      $sql =mysql_query("SELECT * From common WHERE type='$type' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$ty=$row['type'];
					if($ty=='Estimate')
					{
			  ?>
		          	<tr>
		          	 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					  <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>
			    <?php
					}
					else if($ty=='Invoice')
					{
				?>
					<tr>
					 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>
		        <?php
					}
					else if($ty=='Recurring')
					{
				?>
					<tr>
					  <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['created_at']));?></td>
					 <td><?php echo $row['due_date'];?></td>
					 <td><?php echo $row['status'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><?php echo $row['gross_amount'];?></td>
					 <td><a href="dashboard.php?page=edit_recurring_invoice&id=<?php echo $row['id'];?>"><?php echo $row['type']; ?></a></td>
		          </tr>
				<?php
					}
			       }
	             }
	          ?>
          </tbody>
</table>    
          
