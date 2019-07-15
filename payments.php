<?php 
// var_dump($_POST);
include "config.php";

$user_id =$_POST['user_id'];
$sub_id =$_POST['sub_us_id'];
$sub_us_ty= $_POST['sub_us_ty'];

$txt_date = $_POST['txt_date'];
$amount = $_POST['amount'];
$txt_desc = $_POST['txt_desc'];
$invoice_id = $_POST['invoice_id'];


$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{

 $query = mysql_query("SELECT * FROM common WHERE id='$invoice_id'")or die(mysql_error($connection));
    $row=mysql_fetch_array($query);

	$due=$row['due_amt'];
	$test=$due-$amount;
	$paid_amount=$row['paid_amount'];
	$p_amt=$paid_amount+$amount;

if($due>=$amount)
	{
	$qu= mysql_query("UPDATE common SET due_amt='$test',paid_amount='$p_amt', status='Closed' WHERE id='$invoice_id'")or die(mysql_error($connection));

	if($qu==true)
		{

			 $query = mysql_query("SELECT * FROM common WHERE id='$invoice_id'")or die(mysql_error($connection));
				$row=mysql_fetch_array($query);
				
				$due1=$row['due_amt'];

			if($due1==0.00)
			{
				
			   $qu= mysql_query("UPDATE common SET status='Closed' WHERE id='$invoice_id'")or die(mysql_error($connection));
				  if($qu==true)
					{
					  $sql_query = mysql_query("INSERT INTO `payment`(`user_id`,`sub_user_id`,`invoice_id`, `date`, `amount`, `notes`) VALUES('$sub_id','$user_id','$invoice_id','$txt_date','$amount','$txt_desc')")or die(mysql_error());
						
						if($sql_query)
							{
								echo "1";
							}
					}
			}
			else
			{

			 $qu= mysql_query("UPDATE common SET due_amt='$test',paid_amount='$p_amt', status='Pending' WHERE id='$invoice_id'")or die(mysql_error($connection));
				if($qu==true)
					{
					
						$sql_query = mysql_query("INSERT INTO `payment`(`user_id`,`sub_user_id`,`invoice_id`, `date`, `amount`, `notes`) VALUES('$sub_id','$user_id','$invoice_id','$txt_date','$amount','$txt_desc')")or die(mysql_error());
					
							if($sql_query)
							{
								echo "1";
							}
					}
			}

		}
	}
	else
	{
		echo"2";
	}	
}//type user if end
else{

	$query = mysql_query("SELECT * FROM common WHERE id='$invoice_id'")or die(mysql_error($connection));
  	$row=mysql_fetch_array($query);

	$due=$row['due_amt'];
	$test=$due-$amount;
	$paid_amount=$row['paid_amount'];
	$p_amt=$paid_amount+$amount;

	if($due>=$amount)
	{
	$qu= mysql_query("UPDATE common SET due_amt='$test',paid_amount='$p_amt', status='Closed' WHERE id='$invoice_id'")or die(mysql_error($connection));

	if($qu==true)
		{

			 $query = mysql_query("SELECT * FROM common WHERE id='$invoice_id'")or die(mysql_error($connection));
				$row=mysql_fetch_array($query);
				
				$due1=$row['due_amt'];

			if($due1==0.00)
			{
				
			   $qu= mysql_query("UPDATE common SET status='Closed' WHERE id='$invoice_id'")or die(mysql_error($connection));
				  if($qu==true)
					{
					  $sql_query = mysql_query("INSERT INTO `payment`(`user_id`,`sub_user_id`,`invoice_id`, `date`, `amount`, `notes`) VALUES('$user_id','$sub_id','$invoice_id','$txt_date','$amount','$txt_desc')")or die(mysql_error());
						
						if($sql_query)
							{
								echo "1";
							}
					}
			}
			else
			{

			 $qu= mysql_query("UPDATE common SET due_amt='$test',paid_amount='$p_amt', status='Pending' WHERE id='$invoice_id'")or die(mysql_error($connection));
				if($qu==true)
					{
					
						$sql_query = mysql_query("INSERT INTO `payment`(`user_id`,`sub_user_id`,`invoice_id`, `date`, `amount`, `notes`) VALUES('$user_id','$sub_id','$invoice_id','$txt_date','$amount','$txt_desc')")or die(mysql_error());
					
							if($sql_query)
							{
								echo "1";
							}
					}
			}

		}

	}//end of due loop
	else{
			echo "2";
		}
}
	
 ?>