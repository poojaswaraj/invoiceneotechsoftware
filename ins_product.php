<?php 
// var_dump($_POST);
include "config.php";

$user_id =$_POST['user_id'];
$sub_id =$_POST['sub_us_id'];
$sub_us_ty= $_POST['sub_us_ty'];

$user_id = $_POST['user_id'];
$pname = $_POST['txt_pname'];
$txt_hsn = $_POST['txt_hsn'];
$desc = $_POST['txt_desc'];
$price = $_POST['txt_price'];
// $txt_units = $_POST['txt_units'];
	
$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{	
 $sql_query = mysql_query("INSERT INTO `product`(`user_id`,`sub_user_id`,`reference`,`hsn_code`,`description`, `base_price`,`created_at`) 
	VALUES ('$sub_id','$user_id','$pname','$txt_hsn','$desc','$price',now())")or die(mysql_error());
	
	if($sql_query)
	{
		echo "1";
	}
	else
	{
		echo "2";
	}
}
else{
	$sql_query = mysql_query("INSERT INTO `product`(`user_id`,`sub_user_id`,`reference`,`hsn_code`,`description`, `base_price`,`created_at`) 
	VALUES ('$user_id','$sub_id','$pname','$txt_hsn','$desc','$price',now())")or die(mysql_error());
	
	if($sql_query)
	{
		echo "1";
	}
	else
	{
		echo "2";
	}
}

 ?>