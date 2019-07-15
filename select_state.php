<?php
include "config.php";

$searchTerm = $_GET['term'];
 
 $data;
$select =mysql_query("SELECT * FROM tbl_states WHERE name LIKE '%".$searchTerm."%'")or die(mysql_error($connection));
while ($row=mysql_fetch_array($select)) 
{
 $data[] = $row['name'];
}
//return json data
echo json_encode($data);
?>

 

