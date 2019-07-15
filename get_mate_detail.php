<?php 
include('config.php');

   $id=$_POST['id'];

	$sql=mysql_query("SELECT b.qty,a.* FROM mst_material a LEFT JOIN material_stock b ON a.id=b.mate_id WHERE a.id='$id'");
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>