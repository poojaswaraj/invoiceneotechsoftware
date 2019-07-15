<?php
 // var_dump($_POST);
 // $sess=$_SESSION['SESS_MEMBER_ID'];
include "config.php";
$id=$_POST['id'];

$query=mysql_query("SELECT b.reference,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id  WHERE a.id='$id'") or die(mysql_error($connection));
	$data=mysql_fetch_assoc($query);
		
	if($query==true)
	{
		echo json_encode($data);
	}
	else{
		echo "error".mysql_error($connection);
	}

?>