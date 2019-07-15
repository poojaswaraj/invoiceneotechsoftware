<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
    $unit = $_POST['txt_unit'];
	$dt=date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$query = mysql_query("SELECT * FROM mst_unit WHERE unit='$unit'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);
		$count=mysql_num_rows($query);

		if($count==0)
		{
			$sql = mysql_query("INSERT INTO mst_unit (`user_id`,`sub_user_id`,`unit`,`record_date`) VALUES ('$sub_id','$user_id','$unit','$dt')")or die(mysql_error($connection));
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2".mysql_error($connection);
				}
		}
		else{
			echo "4";
		}
	}//end user loop
	else{
		$query = mysql_query("SELECT * FROM mst_unit WHERE unit='$unit'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);
		$count=mysql_num_rows($query);

		if($count==0)
		{
			$sql = mysql_query("INSERT INTO mst_unit (`user_id`,`sub_user_id`,`unit`,`record_date`) VALUES ('$user_id','$sub_id','$unit','$dt')")or die(mysql_error($connection));
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2".mysql_error($connection);
				}
		}
		else{
			echo "4";
		}
	}
?>