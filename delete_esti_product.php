<?php
include "config.php";

$id=$_POST['id'];

 $sql2 = mysql_query("DELETE FROM item where id='$id'")or die(mysql_error($connection));
	 if($sql2==true)
		{
		  $sql1 = mysql_query("DELETE FROM item_tax where item_id='$id'")or die(mysql_error($connection));
			if($sql1==true)
			 {
				echo "1";
			 }
		}
?>