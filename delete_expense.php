<?php
include "config.php";

$id=$_POST['id'];

	$sql = mysql_query("DELETE FROM expenses where id='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			$query = mysql_query("SELECT * FROM purches_tax WHERE purches_id='$id'")or die(mysql_error($connection));
			$row=mysql_fetch_array($query);
			$cnt=mysql_num_rows($query);

			if($cnt==1)
			{
				$sql1 = mysql_query("DELETE FROM purches_tax where purches_id='$id'")or die(mysql_error($connection));
				if ($sql1==true) 
				{
					echo "1";
				}
			}
			else{
				echo "1";
			}
		}

?>