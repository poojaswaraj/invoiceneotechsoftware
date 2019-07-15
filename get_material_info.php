<?php 
include('config.php');

$id=$_POST['id'];

	$sql=mysql_query("SELECT * FROM mst_material WHERE id='$id'");
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>