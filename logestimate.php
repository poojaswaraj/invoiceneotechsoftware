<?php
session_start();//Start session
include"config.php";

$result = mysql_query("SELECT * FROM tbl_session");
while($row = mysql_fetch_array($result))
{
	$fefe=$row['session_id']; 
}
	$sasa=$fefe+1;

	
	mysql_query("UPDATE tbl_session SET session_id = '$sasa'");
	$fgh='000'.$sasa;						
	$finalcode=date("Y-m-$fgh").'-STO';						

	session_regenerate_id();
	$_SESSION['SESS_MEMBER_ID'] = $finalcode;
	session_write_close();
	// $sql=mysql_query("SELECT * FROM user_profile WHERE type='$us_ty'");
	// $row=mysql_fetch_array($sql);
	// // $cnt=mysql_num_rows($sql);
	// $type=$row['type'];
	// if($type=='user')
	// {
	// 	header("location: user_dashboard.php?page=new_estimate");

	// }else{
	header("location: dashboard.php?page=new_estimate");
// }
	
	exit();
?>