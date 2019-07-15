<?php

include "config.php";

$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];
$utype=$_POST['us_ty'];
$reqi_made_by=$_POST['reqi_made_by'];
$sel_project=$_POST['sel_project'];
$material_name=$_POST['material_name'];

$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
 
?>     
<h4>Daily Material Requisition List</h4>
<form role="form" name="frm_customer" action="dashboard.php?page=new_purchase_invoice" method="POST" >
<table id="example" class="datatable table table-striped">
  <thead>
   	<tr>
	  <th>Sr. No</th>
	  <th>Date</th>
	  <th>Requisition Made By</th>
	  <th>Project</th>
	  <th>Material</th>
	  <th>Descriptions</th>
	  <th>Unit</th>
	  <th>Quantity</th>
	  <th>Required By</th>
	  <!-- <th>Comment</th> -->
	  <th>Approval</th>
	  <th>Action</th>
	</tr>
  </thead>
  <tbody>
        <?php
			if($fromdate!='' && $todate!='' && $reqi_made_by!=''&& $sel_project!='' && $material_name!='')
		    {
		    	$sr_no=0;

		    

		    // $sql = mysql_query("SELECT d.name,b.pro_name,c.mat_name,c.brand_name, a.* FROM `daily_material_requisition` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN user_profile d ON d.id=a.requ_made_by WHERE a.mate_id='$material_name' AND a.pro_id='$sel_project' AND a.requ_made_by='$reqi_made_by' AND  date(a.date) BETWEEN  '$fromdate' AND '$todate' AND a.approval='Approved'")or die(mysql_error($connection));

		    $sql = mysql_query("SELECT d.name,b.pro_name,c.mat_name,c.brand_name,a.date,a.requried_by_date,a.approval,a.description as req_desc,a.unit as req_unit,a.qty as req_qty,a.id as requi_id, f.* FROM tbl_po f RIGHT JOIN `daily_material_requisition` a ON f.req_id=a.id INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN user_profile d ON d.id=a.requ_made_by WHERE a.mate_id='$material_name' AND a.pro_id='$sel_project' AND a.requ_made_by='$reqi_made_by' AND  date(a.date) BETWEEN  '$fromdate' AND '$todate' AND a.approval='Approved'")or die(mysql_error($connection));
		    while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
		  		$req_id = $row['requi_id'];
		?>		         
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].")"; ?></td>
			  <td><?php echo $row['req_desc']; ?></td>
			  <td><?php echo $row['req_unit']; ?></td>
			  <td><?php echo $row['req_qty']; ?></td>
			  <td><?php echo $row['requried_by_date']; ?></td>
			  <!-- <td><?php echo $row['comment']; ?></td> -->
			  <td><?php echo $row['approval']; ?></td>
			<!--   <td>
			   <input type="checkbox" name="mult_po[]" value="<?php echo $id;?> ">
			  </td> -->
			  <td>
			  	<?php if($utype=='admin'){ if(empty($id)){?>
			  	<a href='dashboard.php?page=new_purchase_invoice&id=<?php echo $req_id; ?>' title='Generate PO' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Generate PO</button></a>
			  <?php }else{?>
				<a href='dashboard.php?page=edit_purchase_invoice&id=<?php echo $id; ?>' title='View PO' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View PO</button></a>
			  <?php }}else{ ?>
			  	<a href='dashboard.php?page=new_purchase_invoice&id=<?php echo $req_id; ?>' title='Generate PO' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Generate PO</button></a>
			  <?php } ?> 

			  </td>
			</tr>
	    <?php 
			 } 
			}
		else if($fromdate!='' && $todate!='' && $reqi_made_by!=''&& $sel_project!='')
		    {
				$sr_no=0;
			$sql = mysql_query("SELECT d.name,b.pro_name,c.mat_name,c.brand_name,a.date,a.requried_by_date,a.approval,a.description as req_desc,a.unit as req_unit,a.qty as req_qty,a.id as requi_id, f.* FROM tbl_po f RIGHT JOIN `daily_material_requisition` a ON f.req_id=a.id INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN user_profile d ON d.id=a.requ_made_by WHERE  a.pro_id='$sel_project' AND a.requ_made_by='$reqi_made_by' AND  date(a.date) BETWEEN  '$fromdate' AND '$todate' AND a.approval='Approved'")or die(mysql_error($connection));

		// $sql = mysql_query("SELECT d.name,b.pro_name,c.mat_name,c.brand_name, a.* FROM `daily_material_requisition` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN user_profile d ON d.id=a.requ_made_by WHERE a.pro_id='$sel_project' AND a.requ_made_by='$reqi_made_by' AND  date(a.date) BETWEEN  '$fromdate' AND '$todate' AND a.approval='Approved'")or die(mysql_error($connection));
		    while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
		  		$req_id = $row['requi_id'];
	    ?>	
	    	<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].")"; ?></td>
			  <td><?php echo $row['req_desc']; ?></td>
			  <td><?php echo $row['req_unit']; ?></td>
			  <td><?php echo $row['req_qty']; ?></td>
			  <td><?php echo $row['requried_by_date']; ?></td>
			  <!-- <td><?php echo $row['comment']; ?></td> -->
			  <td><?php echo $row['approval']; ?></td>
			 <!--  <td>
			  	<input type="checkbox" name="mult_po[]" value="<?php echo $id;?> ">
			  </td> -->
			  <td>
			  	<?php if($utype=='admin'){ if(empty($id)){?>
			  	<a href='dashboard.php?page=new_purchase_invoice&id=<?php echo $req_id; ?>' title='Generate PO' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Generate PO</button></a>
			  <?php }else{?>
				<a href='dashboard.php?page=edit_purchase_invoice&id=<?php echo $id; ?>' title='View PO' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View PO</button></a>
			  <?php }}else{ ?>
			  	<a href='dashboard.php?page=new_purchase_invoice&id=<?php echo $req_id; ?>' title='Generate PO' data-toggle='tooltip'><button class="btn btn-sm btn-primary" type="button">Generate PO</button></a>
			  <?php } ?> 

			  </td>
			</tr>

	    <?php } }?>
	</tbody>
</table>    
 <!-- <input type="submit" class="btn btn-primary" value="Generate PO" /> -->
</form>
