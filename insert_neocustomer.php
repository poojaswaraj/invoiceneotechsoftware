<?php 
	include "config.php";

	$user_id =$_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$name = $_POST['txt_name'];
	$txt_mail = $_POST['txt_mail'];
	$txt_contact = $_POST['txt_contact'];
	$txt_address = $_POST['txt_address'];
	$dt = date('Y-m-d');

	$query = mysql_query("SELECT * FROM mst_customer WHERE `cust_email`='$txt_mail' or `cust_contact`='txt_contact'")or die(mysql_error($connection));
	$row=mysql_fetch_array($query);

	$count= mysql_num_rows($query);
	if($count==0)
	{
		$sql = mysql_query("INSERT INTO `mst_customer`(`user_id`,`sub_user_id`,`cust_name`, `cust_contact`, `cust_email`, `cust_address`, `record_date`) VALUES ('$user_id','$sub_id','$name','$txt_contact','$txt_mail','$txt_address','$dt')")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}
	}
	else{
		echo "4";
	}
 ?>