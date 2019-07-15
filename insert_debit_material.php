<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

    $record_id = $_POST['record_id'];
	$pro_id = $_POST['txt_id1'];
	$po_mate_record_id = $_POST['po_mate'];
	$material_name = $_POST['material_names'];
	$txt_desc = addslashes($_POST['txt_descs']);
	$txt_unit =addslashes($_POST['txt_units']);
	$txt_qty = $_POST['txt_qtys'];
	$txt_rate = $_POST['txt_rates'];
	$select_tax = $_POST['select_taxs'];
	$txt_price = $_POST['txt_prices'];
	$tax_amt = $_POST['tax_amts'];
	$txt_comment = addslashes($_POST['txt_comments']);
	$dt = date('Y-m-d');
	$base_amt=$txt_qty*$txt_rate;

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$temp=0;
		$aa = mysql_query("SELECT * FROM tbl_debit")or die(mysql_error($connection));
		while($rr=mysql_fetch_array($aa))
		  {
		  	 $c_id= $rr['id'];
		  	 
		  }
		  if(!empty($c_id)){
		     $temp=$c_id+1;
		  }
		  else{
		  		$temp=0+1;
		  }	

		  
		  	$aaz = mysql_query("SELECT * FROM tbl_debit_materials WHERE po_mate_record_id='$po_mate_record_id' ")or die(mysql_error($connection));
			$rr1=mysql_fetch_array($aaz);
			$mat_id= $rr1['id'];
			$cnt = mysql_num_rows($aaz);
		if($cnt==1)
		  {

		 	 $sql3 = mysql_query("UPDATE `tbl_debit_materials` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`qty`='$txt_qty',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`comment`='$txt_comment',`update_date`='$dt' WHERE `id`='$mat_id'")or die(mysql_error($connection));

		  }else{
		  	
		  $sql3 = mysql_query("INSERT INTO `tbl_debit_materials`(`user_id`, `sub_user_id`, `debit_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `created_date`,`po_mate_record_id`) VALUES ('$sub_id','$user_id','$temp','$pro_id','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$base_amt','$select_tax','$tax_amt','$txt_price','$txt_comment','$dt','$po_mate_record_id')")or die(mysql_error($connection));
		  }
		
	 	if($sql3==true)
		{
		 	echo "1";
		}
		else{
			echo "2";
		}
	}//User loop end 
	else{
		
		$temp=0;
		$aa = mysql_query("SELECT * FROM tbl_debit")or die(mysql_error($connection));
		while($rr=mysql_fetch_array($aa))
		  {
		  	 $c_id= $rr['id'];
		  	
		  }
		  if(!empty($c_id)){
		     $temp=$c_id+1;
		  }
		  else{
		  		$temp=0+1;
		  }	
		  
		  $aaz = mysql_query("SELECT * FROM tbl_debit_materials WHERE po_mate_record_id='$po_mate_record_id' ")or die(mysql_error($connection));
			$rr1=mysql_fetch_array($aaz);
			$mat_id= $rr1['id'];
			$cnt = mysql_num_rows($aaz);
		if($cnt==1)
		  {
		  	$sql3 = mysql_query("UPDATE `tbl_debit_materials` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`qty`='$txt_qty',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`comment`='$txt_comment',`update_date`='$dt' WHERE `id`='$mat_id'")or die(mysql_error($connection));

		  }else{
		 
			$sql3 = mysql_query("INSERT INTO `tbl_debit_materials`(`user_id`, `sub_user_id`, `debit_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `created_date`,`po_mate_record_id`) VALUES ('$user_id','$sub_id','$temp','$pro_id','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$base_amt','$select_tax','$tax_amt','$txt_price','$txt_comment','$dt','$po_mate_record_id')")or die(mysql_error($connection));
		}
		 	if($sql3==true)
			{
			 	echo "3";
			}
			else{
				echo "2";
			}
	}

?>