<?php 

include "config.php";
		
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$cname = ucwords($_POST['txt_cname']);
	$cleagal_id = $_POST['txt_cleagal_id'];
	$txt_gstno = $_POST['txt_gstno'];
	$cperson = $_POST['txt_cperson'];
	$cemail = $_POST['txt_cemail'];
	$iaddr = $_POST['txt_iaddr'];
	$saddr = $_POST['txt_saddr'];
	$string = str_replace(' ', '', $cname);

$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{	
	
	$qu = mysql_query("SELECT * FROM customer WHERE `name`='$cname'")or die(mysql_error($connection));

	$data=mysql_fetch_array($qu);
	$c_id=$data['id'];
	$count=mysql_num_rows($qu);
	if($count>0)
	{

		$sql_query = mysql_query("UPDATE customer SET `user_id`='$sub_id',`sub_user_id`='$user_id', `name`='$cname',`name_slug`='$string',`identification`='$cleagal_id',`contact_person`='$cperson',`email`='$cemail',`invoicing_address`='$iaddr',`shipping_address`='$saddr',`gst_no`='$txt_gstno' WHERE id='$c_id'")or die(mysql_error($connection));

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
			$sql_query = mysql_query("INSERT INTO `customer`(`user_id`,`sub_user_id`,`name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`,`gst_no`) 
		VALUES ('$sub_id','$user_id','$cname','$string','$cleagal_id','$cemail','$cperson','$iaddr','$saddr','$txt_gstno')")or die(mysql_error());
		
				if($sql_query)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}


	}
}//type user if loop end
else{
	$qu = mysql_query("SELECT * FROM customer WHERE `name`='$cname'")or die(mysql_error($connection));

	$data=mysql_fetch_array($qu);
	$c_id=$data['id'];
	$count=mysql_num_rows($qu);
	if($count>0)
	{

		$sql_query = mysql_query("UPDATE customer SET `user_id`='$user_id',`sub_user_id`='$sub_id', `name`='$cname',`name_slug`='$string',`identification`='$cleagal_id',`contact_person`='$cperson',`email`='$cemail',`invoicing_address`='$iaddr',`shipping_address`='$saddr',`gst_no`='$txt_gstno' WHERE id='$c_id'")or die(mysql_error($connection));

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
			$sql_query = mysql_query("INSERT INTO `customer`(`user_id`,`sub_user_id`,`name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`,`gst_no`) 
		VALUES ('$user_id','$sub_id','$cname','$string','$cleagal_id','$cemail','$cperson','$iaddr','$saddr','$txt_gstno')")or die(mysql_error());
		
				if($sql_query)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}


	}
}
?>