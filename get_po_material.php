
<?php 
include('config.php');

   $id=$_POST['id'];

	$sql = mysql_query("SELECT b.* FROM `tbl_po` a INNER JOIN `tbl_po_matrials` b ON a.id=b.po_id WHERE b.id='$id'")or die(mysql_error($connection));
	
	$data=mysql_fetch_assoc($sql);
	
	if($sql==true)
	{
		echo json_encode($data);
	}
	else{
		echo "2".mysql_error();
	}
	
 ?>