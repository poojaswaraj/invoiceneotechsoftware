<?php
include "config.php";

$searchTerm = $_GET['term'];
// $user_ty=$_GET['u_ty'];
// $user_id=$_GET['u_id'];
$data;

// $query = mysql_query("SELECT * FROM user_profile WHERE type='$user_ty'");
// 	$row=mysql_fetch_array($query);
// 		$type= $row['type'];
// 		$us_id= $row['user_id'];

// if($type=='user')
// {	

// 	$select =mysql_query("SELECT * FROM mst_supplier WHERE name LIKE '%".$searchTerm."%'")or die(mysql_error($connection));
// 	while ($row=mysql_fetch_array($select)) 
// 		{
// 		 $data[] = $row['name'];
// 		}
// 	//return json data
// 	echo json_encode($data);
// } //end of type user if loop
// else
// 	{
		$select =mysql_query("SELECT * FROM mst_supplier WHERE name LIKE '%".$searchTerm."%'")or die(mysql_error($connection));
		while ($row=mysql_fetch_array($select)) 
			{
			 $data[] = $row['name'];
			}
			//return json data
		echo json_encode($data);
	// }
?>

 

