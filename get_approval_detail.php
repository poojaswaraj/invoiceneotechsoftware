
<?php 
include('config.php');

   $id=$_POST['id'];

	$sql = mysql_query("SELECT * FROM daily_material_requisition WHERE id='$id'")or die(mysql_error($connection));
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>