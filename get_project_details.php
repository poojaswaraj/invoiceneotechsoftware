<?php 
include('config.php');

   $id=$_POST['pro_id'];
   
	$sql=mysql_query("SELECT * FROM new_project  WHERE id='$id'");
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2";
	}
	
 ?>