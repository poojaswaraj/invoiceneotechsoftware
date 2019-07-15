<?php 
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id = $_POST['txt_id'];
	$supp_name = $_POST['supplier_name'];
	$date = $_POST['date'];
	$material_name = $_POST['material_name'];
	$txt_desc = addslashes($_POST['txt_desc']);
	$txt_unit = $_POST['txt_unit'];
	$txt_rate = $_POST['txt_rate'];
	$txt_qty = $_POST['txt_qty'];
	$txt_amount = $_POST['txt_amount'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$txt_sgst = $_POST['txt_sgst'];
	$txt_cgst = $_POST['txt_cgst'];
	$txt_total_amt = $_POST['txt_total_amt'];
	$sel_project = $_POST['sel_project'];
	$grn = $_POST['grn'];
	$po_wo_no = $_POST['po_wo_no'];
	$challan_no = $_POST['challan_no'];
	$dt = date('Y-m-d');
	$batch_no = $_POST['batch_no'];
	$gadi_no = $_POST['gadi_no'];

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];
$sql12=mysql_query("SELECT * from  material_procurement where challan='$challan_no'")or die(mysql_error($connection));
if(mysql_num_rows($sql12)!=0)
{
	
	echo"4";
}
	else{
	if($type=='user')
	{

	$sql = mysql_query("UPDATE `material_procurement` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`supp_id`='$supp_name',`pro_id`='$sel_project',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`qty`='$txt_qty',`amount`='$txt_amount',`date`='$date',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_total_amt',`sgst`='$txt_sgst',`cgst`='$txt_cgst',`grn`='$grn',`po_wo_no`='$po_wo_no',`challan`='$challan_no',`update_date`='$dt',`batch_no`='$batch_no',`gadi_no`='$gadi_no' WHERE `id`='$id'")or die(mysql_error($connection));
		
		if ($sql==true) {
			
			$query = mysql_query("UPDATE `material_stock` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`mate_id`='$material_name',`desc`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`qty`='$txt_qty',`update_date`='$dt' WHERE `mate_id`='$material_name'")or die(mysql_error($connection));
				if($query==true)
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
	}//user loop end
	else{

		$sql = mysql_query("UPDATE `material_procurement` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`supp_id`='$supp_name',`pro_id`='$sel_project',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`qty`='$txt_qty',`amount`='$txt_amount',`date`='$date',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_total_amt',`sgst`='$txt_sgst',`cgst`='$txt_cgst',`grn`='$grn',`po_wo_no`='$po_wo_no',`challan`='$challan_no',`update_date`='$dt',`batch_no`='$batch_no',`gadi_no`='$gadi_no' WHERE `id`='$id'")or die(mysql_error($connection));
		
		if ($sql==true) {
			
			$query = mysql_query("UPDATE `material_stock` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`mate_id`='$material_name',`desc`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`qty`='$txt_qty',`update_date`='$dt' WHERE `mate_id`='$material_name'")or die(mysql_error($connection));
				if($query==true)
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
}
 ?>