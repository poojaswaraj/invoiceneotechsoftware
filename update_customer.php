<?php 

include "config.php";
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$txt_id = $_POST['txt_id'];
	$cname = ucwords($_POST['txt_cname']);
	$cleagal_id = $_POST['txt_cleagal_id'];
	$txt_gstno = $_POST['txt_gstno'];
	$cperson = $_POST['txt_cperson'];
	$cemail = $_POST['txt_cemail'];
	$iaddr = $_POST['txt_iaddr'];
	$saddr = $_POST['txt_saddr'];
	
$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{	
	$edit_query=mysql_query("UPDATE `customer` SET `user_id`='$sub_id',`sub_user_id`='$user_id', name='$cname',name_slug='$cname',identification='$cleagal_id',email='$cemail',contact_person='$cperson',invoicing_address='$iaddr',shipping_address='$saddr',gst_no='$txt_gstno' WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query==true)
	{
		echo "1";
	}
	else
	{
		echo "2";
	}
}
else{
	$edit_query=mysql_query("UPDATE `customer` SET `user_id`='$user_id',`sub_user_id`='$sub_id', name='$cname',name_slug='$cname',identification='$cleagal_id',email='$cemail',contact_person='$cperson',invoicing_address='$iaddr',shipping_address='$saddr',gst_no='$txt_gstno' WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query==true)
	{
		echo "3";
	}
	else
	{
		echo "2";
	}
}

 ?>