<?php

include "config.php";

$tax_name = $_POST['tax_name'];
$tax_value = $_POST['tax_value'];

$sub_tax= $tax_value/2;

if(isset($_POST['chk1']) && isset($_POST['chk2']))

	{
		$sql = mysql_query("INSERT INTO tax (`name`,`value`,`active`,`is_default`,`sgst`,`cgst`,`igst`) VALUES ('$tax_name','$tax_value','1','1','SGST @ $sub_tax%', 'CGST @ $sub_tax%','IGST@ $tax_value%')")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}

else if(isset($_POST['chk1']) && !isset($_POST['chk2']))
{
	$sql1 = mysql_query("INSERT INTO tax (`name`,`value`,`active`,`is_default`,`sgst`,`cgst`,`igst`) VALUES ('$tax_name','$tax_value','1','0','SGST @ $sub_tax%', 'CGST @ $sub_tax%','IGST@ $tax_value%')")or die(mysql_error($connection));

			if($sql1==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	

}
else if(!isset($_POST['chk1']) && isset($_POST['chk2']))
{
	$sql2 = mysql_query("INSERT INTO tax (`name`,`value`,`active`,`is_default`,`sgst`,`cgst`,`igst`) VALUES ('$tax_name','$tax_value','0','1','SGST @ $sub_tax%', 'CGST @ $sub_tax%','IGST@ $tax_value%')")or die(mysql_error($connection));

			if($sql2==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	

}
else
{
		$sql3 = mysql_query("INSERT INTO tax (`name`,`value`,`active`,`is_default`,`sgst`,`cgst`,`igst`) VALUES ('$tax_name','$tax_value','0','0','SGST @ $sub_tax%', 'CGST @ $sub_tax%','IGST@ $tax_value%')")or die(mysql_error($connection));

			if($sql3==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	

}

?>