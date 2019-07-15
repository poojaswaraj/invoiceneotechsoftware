<?php
include 'config.php';
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
	$sql = mysql_query("SELECT * FROM city WHERE st_id = ".$_POST['state_id']." ")or die(mysql_error($connection));
	//count total num of rows
	$rowCount = mysql_num_rows($sql);
	//Display cities list
    if($rowCount > 0){
		echo '<option value="">Select City</option>';
		while($row=mysql_fetch_array($sql))
		{
			echo '<option value="'.$row['ct_id'].'">'.$row['ct_name'].'</option>';
		}
	}
}

?>
