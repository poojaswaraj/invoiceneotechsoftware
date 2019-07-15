<?php 
//var_dump($_POST);
include "config.php";
 $data= $_POST['data'];
$user_id= $_POST['user_id'];
$sub_id=$_POST['sub_us_id'];
$sub_us_ty=$_POST['sub_us_ty'];
 $po_no =$_POST['po_no'];
$po_date =$_POST['po_date'];
$sel_pro= $_POST['sel_pro'];
// echo $ser_no= $_POST['series_id'];
  $idate= $_POST['idate'];
 $ddate= $_POST['ddate'];


$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];
 $sql4 = mysql_query("UPDATE common SET `user_id`='$user_id',`sub_user_id`='$sub_id',`po_no`='$po_no',`po_date`='$po_date',`po_project_name`='$sel_pro',`issue_date`='$idate',`due_date`='$ddate' WHERE id='$data'")or die(mysql_error($connection));
 			
 			 
			if($sql4==true)
				{
				 // $c_id = mysql_insert_id();
					if($sql4==true)
						{
							echo "3";
						}
						else
						{
							echo "2";
						}

				}

?>