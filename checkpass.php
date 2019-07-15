<?php 

	include "config.php";

$old_pass = $_POST['old_pass'];

	$query = mysql_query("SELECT * FROM `user` WHERE password='$old_pass'")or die(mysql_error($connection));

	$row=mysql_fetch_array($query);
	 $count=mysql_num_rows($query);
		if($count>0)
			{		    
				  echo"1";
			}
			else
				{
				    echo"2".mysql_error($connection);
				}

?>