
<?php 
include('config.php');

   $id=$_POST['id'];

	$sql = mysql_query("SELECT * FROM `tbl_po_matrials` WHERE id='$id'")or die(mysql_error($connection));
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>