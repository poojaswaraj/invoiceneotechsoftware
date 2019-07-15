<?php 

	include "config.php";
		$txt_id = $_POST['txt_id1'];
		$qty = $_POST['txt_qtys'];
	$rate = $_POST['txt_rates'];
	$comment = $_POST['txt_comments'];
	//$txt_terms = $_POST['txt_terms'];
	$dt = date('Y-m-d');
				
		$sql = mysql_query("UPDATE `tbl_debit_materials` SET `qty`='$qty',`rate`='$rate',`comment`='$comment',`update_date`='$dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}
	
	
?>