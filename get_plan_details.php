<?php 
include('config.php');

   $id=$_POST['id'];
   
	$sql=mysql_query("SELECT * FROM tbl_planning  WHERE task_id='$id'");
	
	$data=mysql_fetch_assoc($sql);
	if ($data==null) {
		echo "3";
	}
	else{
		if($sql==true)
		{
			echo json_encode($data);
		}
		else{
			echo "2";
		}
	}
 ?>