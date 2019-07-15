<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$po_id = $_POST['txt_id'];
	$txt_code = $_POST['txt_code'];
	$supplier_name = $_POST['supplier_name'];
	$dt = date('Y-m-d');
	$ref_po_no = $_POST['ref_po_no'];
	$ref_po_date = $_POST['ref_po_date'];
	$txt_terms = $_POST['txt_terms'];
	$debit_no = $_POST['debit_no'];
	$debit_date = $_POST['debit_date'];

	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		$sql = mysql_query("INSERT INTO `tbl_debit`(`user_id`, `sub_user_id`, `po_id`, `supp_id`, `debit_no`, `debit_date`, `ref_po_no`, `ref_po_date`, `terms`, `create_date`) VALUES ('$sub_id','$user_id','$po_id','$supplier_name','$debit_no','$debit_date','$ref_po_no','$ref_po_date','$txt_terms','$dt')")or die(mysql_error($connection));

			if($sql==true)
			{
				$last_id = mysql_insert_id();

				$quse = mysql_query("UPDATE `tbl_debit_materials` SET `state_code`='$txt_code',`update_date`='$dt' WHERE `debit_id`='$last_id'")or die(mysql_error($connection));
				
				if ($quse==true) {
					echo "1";
				}
				else{
					echo "4";
				}
			}
			else{
				echo "2";
			}
	}//User loop end 
	else{

		$sql = mysql_query("INSERT INTO `tbl_debit`(`user_id`, `sub_user_id`, `po_id`, `supp_id`, `debit_no`, `debit_date`, `ref_po_no`, `ref_po_date`, `terms`, `create_date`) VALUES ('$user_id','$sub_id','$po_id','$supplier_name','$debit_no','$debit_date','$ref_po_no','$ref_po_date','$txt_terms','$dt')")or die(mysql_error($connection));

			if($sql==true)
			{
				$last_id = mysql_insert_id();

				$quse = mysql_query("UPDATE `tbl_debit_materials` SET `state_code`='$txt_code',`update_date`='$dt' WHERE `debit_id`='$last_id'")or die(mysql_error($connection));
				
				if ($quse==true) {
					echo "3";
				}
				else{
					echo "4";
				}
			}
			else{
				echo "2";
			}
	}

?>