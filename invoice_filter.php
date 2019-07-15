<?php

include "config.php";

// $user_id=$_SESSION['login_user'];

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
	  <th>Type</th>
    </tr>
  </thead>
  <tbody>
        <?php
			if($fromdate!='' && $todate!='')
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='Invoice' AND  date(issue_date) BETWEEN  '$fromdate' AND '$todate' AND user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						// $ty=$row['type'];
						$due=$row['due_amt'];
						$amt=$row['gross_amount'];
						$id1=$row['id'];
			  ?>
		          	<tr>
		          	<td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
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
					  <?php 
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
				   <?php } ?>
					 <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><button id="load-payments-for-23" rel="payments:show" value="<?php echo $row['id'];?>" type="button">Payments</button></a></td> -->
		          </tr>
		        
			    <?php
					
			       }
			    }
			    else
				{
					$sr_no=0;
		          $sql =mysql_query("SELECT * From common WHERE type='Invoice' WHERE user_id='$user_id' ORDER BY issue_date DESC ")or die(mysql_error($connection));
		          
		           while($row=mysql_fetch_array($sql))
					{
						$sr_no++;
						$id1=$row['id'];
						$ty=$row['type'];
						$due=$row['due_amt'];
						$amt=$row['gross_amount'];
			  ?>
		          	<tr>
		          	 <td><?php echo $sr_no;?></td>
		          	 <td><?php echo $row['number'];?></td>
				     <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><?php echo $row['customer_name'];?></a></td>
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
					   <?php 
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
				   <?php } ?>
					 <!-- <td><a href="dashboard.php?page=edit_new_invoice&id=<?php echo $row['id'];?>"><button id="load-payments-for-23" rel="payments:show" value="<?php echo $row['id'];?>" type="button">Payments</button></a></td> -->
		          </tr>
		      <?php
					
			       }
	             }
	          ?>
          </tbody>
</table>    
          
