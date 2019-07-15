<?php 
include "config.php";

$user_id =$_POST['user_id'];
$sub_id =$_POST['sub_us_id'];
$sub_us_ty= $_POST['sub_us_ty'];

$txt_id = $_POST['txt_id'];
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

$edit_query=mysql_query("UPDATE `product` SET `user_id`='$sub_id',`sub_user_id`='$user_id', reference='$pname',hsn_code='$txt_hsn',description='$desc',base_price='$price',updated_at=now() WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		echo "1";
	}
	else
	{
		echo "2";
	}
}
else{
	$edit_query=mysql_query("UPDATE `product` SET `user_id`='$user_id',`sub_user_id`='$sub_id', reference='$pname',hsn_code='$txt_hsn',description='$desc',base_price='$price',updated_at=now() WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		echo "3";
	}
	else
	{
		echo "2";
	}
}

 ?>