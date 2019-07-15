<?php
include "config.php";
$id=$_POST['name'];

$query=mysql_query("SELECT b.name as state_name,b.state_code,c.ct_name, a.* FROM `mst_supplier` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id
 where a.id='$id'") or die(mysql_error($connection));
	$data=mysql_fetch_assoc($query);

	if($query==true)
	{
		echo json_encode($data);
	}
	else{
		echo "error".mysql_error($connection);
	}

?>