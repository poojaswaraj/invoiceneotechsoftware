<?php 
include('config.php');

   $result=$_POST['id'];
   $result_explode = explode(',', $result);
   $id=$result_explode[0];
   $pro_id= $result_explode[1];

	$sql=mysql_query("SELECT b.bal_qty,a.* FROM mst_material a LEFT JOIN material_stock b ON a.id=b.mate_id WHERE b.pro_id='$pro_id' AND a.id='$id'");
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>