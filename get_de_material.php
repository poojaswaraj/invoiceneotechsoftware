
<?php 
include('config.php');

  $id=$_POST['id'];

	$sql = mysql_query("SELECT b.pro_id ,b.* FROM `tbl_debit` a INNER JOIN`tbl_debit_materials` b ON a.id=b.debit_id WHERE b.debit_id='$id'")or die(mysql_error($connection));
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>