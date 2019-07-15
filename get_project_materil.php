<?php
include 'config.php';
if(isset($_POST["pro_id"]) && !empty($_POST["pro_id"])){
    //Get all city data
	$sql = mysql_query("SELECT a.pro_id,b.* FROM `material_stock` a INNER JOIN mst_material b ON a.mate_id=b.id WHERE a.pro_id = ".$_POST['pro_id']." ")or die(mysql_error($connection));
	//count total num of rows
	$rowCount = mysql_num_rows($sql);
	//Display cities list
    if($rowCount > 0){
		echo '<option value="">Select Material </option>';
		while($row=mysql_fetch_array($sql))
		{
?>
<option value="<?php echo $row['id']; ?>,<?php echo $row['pro_id']; ?>"><?php echo $row['mat_name'].' ('.$row['brand_name'].")"; ?></option>
		<!-- 	echo '<option value="'.$row['pro_id'].'">'.$row['mat_name'].'('.$row['brand_name'].')'.'</option>'; -->
<?php		
}
	}
}
   
?>
