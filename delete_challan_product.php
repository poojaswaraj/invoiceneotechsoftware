<?php
include "config.php";

$id=$_POST['id'];

$query = mysql_query("SELECT * FROM product a INNER JOIN item b ON a.id=b.product_id WHERE b.id='$id'")or die(mysql_error($connection));
	$row = mysql_fetch_array($query);
	$pro_id=$row['product_id'];
	$qty=$row['quantity'];
	$sold=$row['sold'];
	$sold_item=$sold-$qty;
	$count = mysql_num_rows($query);
	if($count>0)
	{
		$sql21 = mysql_query("UPDATE product SET sold='$sold_item' WHERE id='$pro_id'")or die(mysql_error($connection));
		if($sql21==true)
		{
			$sql2 = mysql_query("DELETE FROM item where id='$id'")or die(mysql_error($connection));
			 if($sql2==true)
				{
				  $sql1 = mysql_query("DELETE FROM item_tax where item_id='$id'")or die(mysql_error($connection));
					if($sql1==true)
					 {
						echo "1";
					 }
				}
		}
	}
else{

	$sql2 = mysql_query("DELETE FROM item where id='$id'")or die(mysql_error($connection));
	 if($sql2==true)
		{
		  $sql1 = mysql_query("DELETE FROM item_tax where item_id='$id'")or die(mysql_error($connection));
			if($sql1==true)
			 {
				echo "1";
			 }
		}
}
?>