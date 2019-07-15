<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
?>
<div class="row">
	<h3>Material Stock</h3><hr>
	<div class="col-lg-12" id="reportdata">
        <h4>Material Stock List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Project Name</th>
			  <th>Material</th>
			  <th>Descriptions</th>
			  <th>Unit</th>
			  <th>Rate</th>
			  <th>Total Stock</th>
			  <th>Used Stock</th>
			  <th>Balance Stock</th>
			</tr>
		  	</thead>
		  	<tbody>
			<?php 
			  	$sr_no=0;
			  	if($utype=='admin'){
			  		$sql = mysql_query("SELECT b.pro_name,c.mat_name,c.brand_name,a.* FROM `material_stock` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id")or die(mysql_error($connection));
			  	}else{
			  		$sql = mysql_query("SELECT b.pro_name,c.mat_name,c.brand_name,a.* FROM `material_stock` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN `project_team` f ON b.id=f.pro_id WHERE f.emp_id='$user_id' ")or die(mysql_error($connection));
			  	}
			  
			  	while($row=mysql_fetch_array($sql))
			  	{
			  		$sr_no++;
			 ?>
				<tr id="invoice-23">
				  <td><?php echo $sr_no; ?></td>
				  <td><?php echo $row['pro_name']; ?></td>
				  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].')';?></td>
				  <td><?php echo $row['desc']; ?></td>
				  <td><?php echo $row['unit']; ?></td>
				  <td><?php echo $row['rate']; ?></td>
				  <td><?php echo $row['total_qty']; ?></td>
				  <td><?php echo $row['qty']; ?></td>
				  <td><?php echo $row['bal_qty']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>