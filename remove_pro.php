<?php 
include "config.php";
$id=$_POST['id'];
$utype=$_POST['utype'];

$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$utype'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

if($type=='user')
{
	$query=mysql_query("SELECT * FROM `item` WHERE common_id='$id' and type='proforma'
		") or die(mysql_error($connection));
		$data=mysql_fetch_array($query);

		$id1=$data['id'];
		$count = mysql_num_rows($query);
		if($count>0)
		{
			$sql = mysql_query("DELETE FROM item where id='$id1' and type='proforma'")or die(mysql_error($connection));
				if($sql==true)
				{
					$sql1 = mysql_query("DELETE FROM item_tax where item_id='$id1'")or die(mysql_error($connection));
					if($sql1==true)
					{
						echo "3";
					}
				}
		}
		else
		{
			echo "4";
		}
}// Type user loop end here
else{
	 $query=mysql_query("SELECT * FROM `item` WHERE common_id='$id' and type='proforma'
			") or die(mysql_error($connection));
		$data=mysql_fetch_array($query);

		$id1=$data['id'];
		$count = mysql_num_rows($query);
		if($count>0)
		{
			$sql = mysql_query("DELETE FROM item where id='$id1' and type='proforma'")or die(mysql_error($connection));
				if($sql==true)
				{
					$sql1 = mysql_query("DELETE FROM item_tax where item_id='$id1'")or die(mysql_error($connection));
					if($sql1==true)
					{
						echo "1";
					}
				}
		}
		else
		{
			echo "2";
		}

 }
 ?>
