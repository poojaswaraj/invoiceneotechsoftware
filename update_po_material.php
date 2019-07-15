<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$txt_id = $_POST['txt_id1'];
	$record_id = $_POST['record_id'];

	$material_name = $_POST['material_names'];
	$txt_desc = addslashes($_POST['txt_descs']);
	$txt_unit =addslashes($_POST['txt_units']);

	$txt_qty = $_POST['txt_qtys'];
	$txt_rate = $_POST['txt_rates'];
	$select_tax = $_POST['select_taxs'];
	$txt_price = $_POST['txt_prices'];
	$tax_amt = $_POST['tax_amts'];
	$base_amt=$txt_qty*$txt_rate;
	$txt_comment = addslashes($_POST['txt_comments']);

	$dt = date('Y-m-d');
	// $base_amt = $txt_qty*$txt_rate;

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$sub_id', `sub_user_id`='$user_id',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`comment`='$txt_comment',`update_date`='$dt',`base_amt`='$base_amt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

	 	if($sql3==true)
		{
			echo "1";
		}
		else{
			echo "2";
		}
	}//User loop end 
	else{
		
		$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$user_id', `sub_user_id`='$sub_id',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`comment`='$txt_comment',`update_date`='$dt',`base_amt`='$base_amt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

	 	if($sql3==true)
		{
			echo "3";
		}
		else{
			echo "2";
		}
	}

?>