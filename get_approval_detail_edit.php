
<?php 
include('config.php');

   $id=$_POST['id'];

	$sql = mysql_query("SELECT c.id as rec_mat_id,c.tax_value as mat_tax,c.rate as mat_rate,c.total_amt,  a.* FROM daily_material_requisition a LEFT JOIN tbl_po b ON a.id=b.req_id INNER JOIN tbl_po_matrials c ON b.id=c.po_id WHERE a.id='$id'")or die(mysql_error($connection));
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>