<?php

include "config.php";

$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];
$utype=$_POST['us_ty'];
//$sel_project=$_POST['sel_project'];
//$material_name=$_POST['material_name'];

$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
 
?>     
	<h4>Debit Note List</h4>
	<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
	  <thead>
		<tr>
		  <th>Sr. No</th>
		  <th>Project Name</th>
		  <th>Supplier Name</th>
		  <th>PO No</th>
		  <th>PO Date</th>
		  <th>Base Amount</th>
		  <th>Total Tax Amount</th>
		  <th>Total Amount</th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
		 <?php 
		  $sr_no=0;
		  
		  $sql = mysql_query("SELECT e.id as deb_id,c.name,b.pro_name, a.* FROM `tbl_po` a LEFT JOIN mst_supplier c ON a.supp_id=c.id LEFT JOIN daily_material_requisition d ON d.id=a.req_id LEFT JOIN new_project b ON a.pro_id=b.id OR d.pro_id=b.id LEFT JOIN tbl_debit e ON a.id=e.po_id  where  date(d.date) BETWEEN  '$fromdate' AND '$todate' ")or die(mysql_error($connection));
		  	while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$po_id = $row['id']; //po_id
		  		 $deb_id = $row['deb_id'];//debit note id
		  	?>

			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['po_no']; ?></td>
			  <td><?php echo $row['po_date']; ?></td>
			  <td><?php echo $row['base_amt']; ?></td>
			  <td><?php echo $row['tax_amt']; ?></td>
			  <td><?php echo $row['grand_total']; ?></td>
			  <td>
			  	<?php if(empty($deb_id)){ ?>
			  	<a href='dashboard.php?page=new_debit_note&id=<?php echo $po_id; ?>' title='Debit Note' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Create Debit Note</button></a>
			  <?php }else{ ?>
			  	<a href='dashboard.php?page=edit_debit_note&id=<?php echo $deb_id; ?>' title='Debit Note' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View Debit Note</button></a>
			  <?php } ?>
			  </td>
			</tr>
			<?php } ?>
	  </tbody>
	</table>