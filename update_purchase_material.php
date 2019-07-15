<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$txt_id = $_POST['txt_id1'];
	$record_id = $_POST['record_id'];
	// $sel_project = $_POST['sel_project'];
	// $material_name = $_POST['material_name'];
	// $txt_desc = addslashes($_POST['txt_desc']);
	// $txt_unit =addslashes($_POST['txt_unit']);
	$txt_qty = $_POST['txt_qty'];
	$txt_rate = $_POST['txt_rate'];
	$select_tax = $_POST['select_tax'];
	$txt_price = $_POST['txt_price'];
	$tax_amt = $_POST['tax_amt'];
	// $txt_comment = addslashes($_POST['txt_comment']);
	$dt = date('Y-m-d');
	$base_amt = $txt_qty*$txt_rate;

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$sub_id', `sub_user_id`='$user_id',`rate`='$txt_rate',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`update_date`='$dt' WHERE `id`='$record_id'")or die(mysql_error($connection));

	 	if($sql3==true)
		{
		 	$sql = mysql_query("UPDATE `tbl_po` SET `user_id`='$sub_id', `sub_user_id`='$user_id',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`grand_total`='$txt_price',`update_date`='$dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2";
				}
		}
		else{
			echo "2";
		}
	}//User loop end 
	else{
		
	
		$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$user_id', `sub_user_id`='$sub_id',`rate`='$txt_rate',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`update_date`='$dt' WHERE `id`='$record_id'")or die(mysql_error($connection));

	 	if($sql3==true)
		{

			$sql = mysql_query("UPDATE `tbl_po` SET `user_id`='$user_id', `sub_user_id`='$sub_id',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`grand_total`='$txt_price',`update_date`='$dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2";
			}
		 	
		}
		else{
			echo "2";
		}
	}

?>