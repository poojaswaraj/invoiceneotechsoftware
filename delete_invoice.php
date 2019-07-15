<?php 
include "config.php";


$id=$_POST['id'];

		$sql = mysql_query("DELETE FROM common where id='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			$qu = mysql_query("SELECT * FROM item WHERE common_id='$id'");
					$rr=mysql_fetch_array($qu);
					$i=$rr['id'];  

			$sql2 = mysql_query("DELETE FROM item where id='$i'")or die(mysql_error($connection));
			if($sql2==true)
			{
				
				$sql1 = mysql_query("DELETE FROM item_tax where item_id='$i'")or die(mysql_error($connection));
					if($sql1==true)
					{
						echo"1";
					}
			}
		}


 ?>