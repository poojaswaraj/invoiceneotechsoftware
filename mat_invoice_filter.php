<?php

include "config.php";

$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];
$utype=$_POST['us_ty'];
 $sel_project=$_POST['sel_project'];
 $supp_name=$_POST['supp_name'];

$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
 
?>     
<h4>Daily Material Requisition List</h4>
<form role="form" name="frm_customer" action="dashboard.php?page=invoice_mat_pro" method="POST" >
<table id="example" class="datatable table table-striped">
   <thead>
			<tr>
			  <th>Sr. No</th>
		
			  <th>Project</th>
			  <th>Supplier</th>

			  <th>Descriptions</th>
			  <th>Unit</th>
			  <th>Rate</th>
			  <th>Qty</th>
			  <th>Basic Amt</th>
			  <th>Tax Rate(%)</th>
			  <th>Tax Amt</th>
					  <th>Action</th>
			</tr>
		  </thead>
  <tbody>
        <?php
			if($fromdate!='' && $todate!='' && $sel_project!='' && $supp_name!='')
		    {
		    	$sr_no=0;


		    $sql = mysql_query("SELECT b.mat_name,b.brand_name,c.name,d.pro_name, a.* FROM `material_procurement` a INNER JOIN mst_material b ON a.mate_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id INNER JOIN new_project d ON a.pro_id=d.id WHERE a.pro_id='$sel_project'and a.supp_id='$supp_name' AND  date(a.date) BETWEEN '$fromdate' AND '$todate'")or die(mysql_error($connection));
		    while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
		?>		         
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
					  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
						  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
	 <td><?php echo $row['amount']; ?></td> 
			  <td><?php echo $row['tax_value'];?></td>
			  <td><?php echo $row['tax_amt'];?></td>
			
			  <td>
			   <input type="checkbox" name="mult_po[]" value="<?php echo $id;?> ">
			  </td>

			</tr>
	    <?php 
			 } 
			}
		else if($fromdate!='' && $todate!='' && $sel_project!='' && $supp_name!='')
		    {
				$sr_no=0;
			$sql = mysql_query("SELECT c.name,b.pro_name, a.* FROM `tbl_po` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id WHERE a.pro_id='$sel_project' AND  date(a.po_date) BETWEEN '$fromdate' AND '$todate'")or die(mysql_error($connection));

		    while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
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
			
			</tr>

	    <?php } }?>
	</tbody>
</table>    
 <input type="submit" class="btn btn-primary" value="Generate Invoice" />
</form>
