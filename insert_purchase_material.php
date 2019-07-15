<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

    $txt_id = $_POST['txt_id1'];
	$sel_project = $_POST['sel_project'];
	$material_name = $_POST['material_name'];
	$txt_desc = addslashes($_POST['txt_desc']);
	$txt_unit =addslashes($_POST['txt_unit']);
	$txt_qty = $_POST['txt_qty'];
	$txt_rate = $_POST['txt_rate'];
	$select_tax = $_POST['select_tax'];
	$txt_price = $_POST['txt_price'];
	$tax_amt = $_POST['tax_amt'];
	$txt_comment = addslashes($_POST['txt_comment']);
	$dt = date('Y-m-d');
	$base_amt=$txt_qty*$txt_rate;

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$temp=0;
		$aa = mysql_query("SELECT * FROM tbl_po ")or die(mysql_error($connection));
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

		  
		  	$aaz = mysql_query("SELECT * FROM tbl_po_matrials WHERE sesssion_no='$txt_id' ")or die(mysql_error($connection));
			$rr1=mysql_fetch_array($aaz);
			$mat_id= $rr1['id'];
			$requ_id = $rr1['sesssion_no'];
			if($txt_id==$requ_id)
		  {

		  	$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`update_date`='$dt' WHERE `id`='$mat_id'")or die(mysql_error($connection));

		  }else{
		  	
		  $sql3 = mysql_query("INSERT INTO `tbl_po_matrials`(`user_id`, `sub_user_id`, `po_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `status`, `sesssion_no`,`record_date`,`base_amt`) VALUES ('$sub_id','$user_id','$temp','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$select_tax','$tax_amt','$txt_price','$txt_comment','1','$txt_id','$dt','$base_amt')")or die(mysql_error($connection));
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
		$aa = mysql_query("SELECT * FROM tbl_po ")or die(mysql_error($connection));
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
		  
		  	$aaz = mysql_query("SELECT * FROM tbl_po_matrials WHERE sesssion_no='$txt_id' ")or die(mysql_error($connection));
			$rr1=mysql_fetch_array($aaz);
			$mat_id= $rr1['id'];
			$requ_id = $rr1['sesssion_no'];
		 if($txt_id==$requ_id)
		  {
		  	$sql3 = mysql_query("UPDATE `tbl_po_matrials` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`rate`='$txt_rate',`base_amt`='$base_amt',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_price',`update_date`='$dt' WHERE `id`='$mat_id'")or die(mysql_error($connection));

		  }else{
			$sql3 = mysql_query("INSERT INTO `tbl_po_matrials`(`user_id`, `sub_user_id`, `po_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `status`, `sesssion_no`,`record_date`,`base_amt`) VALUES ('$user_id','$sub_id','$temp','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$select_tax','$tax_amt','$txt_price','$txt_comment','1','$txt_id','$dt','$base_amt')")or die(mysql_error($connection));
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