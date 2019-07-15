<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
    $brand_name = $_POST['brand_name'];
    $txt_name = $_POST['txt_name'];
   	$description = addslashes($_POST['txt_description']);
	$unit = $_POST['txt_unit'];
	$rate = $_POST['txt_rate'];
	$dt=date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("INSERT INTO mst_material (`user_id`,`sub_user_id`,`mat_name`,`description`,`unit`,`rate`,`brand_name`,`record_date`) VALUES ('$sub_id','$user_id','$txt_name','$description','$unit','$rate','$brand_name','$dt')")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}//end user loop
	else{
		$sql = mysql_query("INSERT INTO mst_material (`user_id`,`sub_user_id`,`mat_name`,`description`,`unit`,`rate`,`brand_name`,`record_date`) VALUES ('$user_id','$sub_id','$txt_name','$description','$unit','$rate','$brand_name','$dt')")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}
?>