<?php
 // var_dump($_POST);
include "config.php";
$id=$_POST['name'];

$query=mysql_query("SELECT * FROM expenses where party_name='$id'") or die(mysql_error($connection));
	$data=mysql_fetch_assoc($query);

	if($query==true)
	{
		echo json_encode($data);
	}
	else{
		echo "error".mysql_error($connection);
	}

?>