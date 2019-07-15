<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$txt_id = $_POST['txt_id'];
	
	$supplier_name = $_POST['supplier_name'];
	$po_no = $_POST['po_no'];
	$po_date = $_POST['po_date'];
	$txt_terms = $_POST['txt_terms'];
	$dt = date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `tbl_po` SET `user_id`='$sub_id', `sub_user_id`='$user_id',`supp_id`='$supplier_name',`po_no`='$po_no',`po_date`='$po_date',`terms`='$txt_terms',`update_date`='$dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}
	}//User loop end 
	else{
		$sql = mysql_query("UPDATE `tbl_po` SET `user_id`='$user_id', `sub_user_id`='$sub_id',`supp_id`='$supplier_name',`po_no`='$po_no', `po_date`='$po_date',`terms`='$txt_terms',`update_date`='$dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2";
			}
	}

?>