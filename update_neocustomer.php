<?php 
	include "config.php";

	$user_id =$_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id = $_POST['txt_id'];
	$name = $_POST['txt_name'];
	$txt_mail = $_POST['txt_mail'];
	$txt_contact = $_POST['txt_contact'];
	$txt_address = $_POST['txt_address'];
	$dt = date('Y-m-d');


	
	$sql = mysql_query("UPDATE `mst_customer` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`cust_name`='$name',`cust_contact`='$txt_contact',`cust_email`='$txt_mail',`cust_address`='$txt_address',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2";
			}
	
 ?>