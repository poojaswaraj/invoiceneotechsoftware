<?php

include "config.php";

  // $fromdate =$_POST['fromDate'];
  // $todate =$_POST['toDate'];
$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];

?>     
<table id="example" class="datatable table table-striped">
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
	  
                      
    </tr>
  </thead>
  <tbody>
        <?php
			if($fromdate!='' && $todate!='')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='Estimate' AND  date(issue_date) BETWEEN  '$fromdate' AND '$todate' AND user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						// $ty=$row['type'];
						$sr_no++;
					
			  ?>
		          	<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <!-- <td><?php echo $row['due_date'];?></td> -->
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <!-- <td><?php echo $row['gross_amount'];?></td> -->
					 <td><?php echo $row['gross_amount'];?></td>
					  
		          </tr>
		        
			    <?php
					
			       }
			    }
				else
			     {
			     	$sr_no=0;
			      $sql =mysql_query("SELECT * From common WHERE type='Estimate' WHERE user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          while($row=mysql_fetch_array($sql))
					{
						$ty=$row['type'];
						$sr_no++;
					
			  ?>
		          	<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_estimate&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
					 <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
					 <!-- <td><?php echo $row['due_date'];?></td> -->
					 <!-- <td><?php echo $row['status'];?></td> -->
					 <!-- <td><?php echo $row['gross_amount'];?></td> -->
					 <td><?php echo $row['gross_amount'];?></td>
		          </tr>
			
				<?php
					
			       }
	             }
	          ?>
          </tbody>
</table>    
          
