<?php 

include "config.php";

	$id = $_POST['tab'];
	$user_id=$_POST['usr_id'];

if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}

else if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}

else if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}	

else if(isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='No',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}

else if(isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='Yes',`voucher`='Yes',`get_purchase`='Yes',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='Yes',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='Yes',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='Yes',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='No',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='Yes',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='Yes',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='Yes',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='No',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='No',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='No',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='Yes',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='No',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='No',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='No',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='Yes',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='No',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='No',`voucher`='No',`get_purchase`='yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='Yes',`product`='No',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='Yes',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='No',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='No',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='No',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='No',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='Yes',`product`='Yes',`voucher`='No',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && isset($_POST['voucher']) && !isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='Yes',`voucher`='Yes',`get_purchase`='No' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && isset($_POST['product']) && !isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='Yes',`voucher`='No',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(!isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='No',`estimates`='No',`product`='No',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
else if(isset($_POST['customer']) && !isset($_POST['estimate']) && !isset($_POST['product']) && isset($_POST['voucher']) && isset($_POST['purchase']))

	{
		$sql = mysql_query("UPDATE company  SET `cutomers`='Yes',`estimates`='No',`product`='No',`voucher`='Yes',`get_purchase`='Yes' WHERE id='$id' AND user_id='$user_id'")or die(mysql_error($connection));

			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}	
	}
?>