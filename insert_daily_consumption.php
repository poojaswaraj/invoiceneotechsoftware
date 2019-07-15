<?php 
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$date = $_POST['date'];
	$sel_project = $_POST['sel_project'];
	$material_name = $_POST['material_name'];
	$txt_desc = addslashes($_POST['txt_desc']);
	$txt_unit = $_POST['txt_unit'];
	$txt_qty = $_POST['txt_qty'];
	$avail_qty = $_POST['avail_qty'];
	$bal_qty = $_POST['bal_qty'];
	$used_for = addslashes($_POST['used_for']);
	$txt_con_name = $_POST['txt_con_name'];
	$comment = addslashes($_POST['comment']);
	$dt =date('Y-m-d');


	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		$sql = mysql_query("INSERT INTO `daily_material_consuption`(`user_id`, `sub_user_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `avail_qty`, `bal_qty`, `date`,`used_for`,`cont_id`,`record_date`,`comment`) VALUES ('$sub_id','$user_id','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_qty','$avail_qty','$bal_qty','$date','$used_for','$txt_con_name','$dt','$comment')")or die(mysql_error($connection));

		if($sql==true)
		{
			$sel=mysql_query("SELECT * FROM `material_stock` WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
			$data=mysql_fetch_array($sel);
			$qt=$data['qty'];
			$used_qty=$txt_qty+$qt;

			$arr=mysql_num_rows($sel);
			if($arr==0){
				$query = mysql_query("UPDATE `material_stock` SET `pro_id`='$sel_project',`qty`='$txt_qty',`bal_qty`='$bal_qty',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project' ")or die(mysql_error($connection));
					if($query==true)
					{
						echo "1";
					}
					else{
						echo "2";
					}
			}else{
				$query = mysql_query("UPDATE `material_stock` SET `pro_id`='$sel_project',`qty`='$used_qty',`bal_qty`='$bal_qty',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project' ")or die(mysql_error($connection));
					if($query==true)
					{
						echo "1";
					}
					else{
						echo "2";
					}
			}
		}
		else{
			echo "2";
		}
	}//user loop end
	else{
		$sql = mysql_query("INSERT INTO `daily_material_consuption`(`user_id`, `sub_user_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `avail_qty`, `bal_qty`, `date`,`used_for`,`cont_id`,`record_date`,`comment`) VALUES ('$user_id','$sub_id','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_qty','$avail_qty','$bal_qty','$date','$used_for','$txt_con_name','$dt','$comment')")or die(mysql_error($connection));

		if($sql==true)
		{
			$sel=mysql_query("SELECT * FROM `material_stock` WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
			$data=mysql_fetch_array($sel);
			$qt=$data['qty'];
			$used_qty=$txt_qty+$qt;

			$arr=mysql_num_rows($sel);
			if($arr==0){
				$query = mysql_query("UPDATE `material_stock` SET `pro_id`='$sel_project',`qty`='$txt_qty',`bal_qty`='$bal_qty',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project' ")or die(mysql_error($connection));
					if($query==true)
					{
						echo "1";
					}
					else{
						echo "2";
					}
			}else{
				$query = mysql_query("UPDATE `material_stock` SET `pro_id`='$sel_project',`qty`='$used_qty',`bal_qty`='$bal_qty',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project' ")or die(mysql_error($connection));
					if($query==true)
					{
						echo "1";
					}
					else{
						echo "2";
					}
			}
			
		}
		else{
			echo "2";
		}
	}

?>