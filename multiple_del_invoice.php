<?php
include "config.php";

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) 
{
	// mysql_query("DELETE FROM common WHERE id='" . $_POST["users"][$i] . "'");

	$sql = mysql_query("DELETE FROM common where id='" . $_POST["users"][$i] . "'")or die(mysql_error($connection));
		if($sql==true)
		{
			$qu = mysql_query("SELECT * FROM item WHERE common_id='" . $_POST["users"][$i] . "'");
					$rr=mysql_fetch_array($qu);
					$i1=$rr['id'][$i];  

			$sql2 = mysql_query("DELETE FROM item where id='$i1'")or die(mysql_error($connection));
			if($sql2==true)
			{
				
				$sql1 = mysql_query("DELETE FROM item_tax where item_id='$i1'")or die(mysql_error($connection));
					// if($sql1==true)
					// {
					// 		// header("Location:dashboard.php?page=invoices");

					// }
			}
		}


}
header("Location:dashboard.php?page=invoices");
?>