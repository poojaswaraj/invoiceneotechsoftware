<?php
 // var_dump($_POST);
include "config.php";
$id=$_POST['id'];

$query=mysql_query("SELECT * FROM payment where invoice_id='$id'") or die(mysql_error($connection)) ;

$jsonData = array();

while($data=mysql_fetch_assoc($query))
{
		 $jsonData[] = $data;
	// echo json_encode($data);
}
echo json_encode($jsonData);

?> 
