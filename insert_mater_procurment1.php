 <?php
include "config.php";
$challan_no = $_POST['challan_no'];
 $sql12=mysql_query("SELECT * from  material_procurement where challan='$challan_no'")or die(mysql_error($connection));
if(mysql_num_rows($sql12)!=0)
{
	//alert(1);
	echo"3";
}
else
{
	echo"4";
}
?>