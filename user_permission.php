<?php 
	include "config.php";

	$id = $_POST['tab'];
	$user_id=$_POST['usr_id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mob=$_POST['mob'];
	$pass=$_POST['pass'];
	$checkBox = implode(',', $_POST['access']);

	$sql = mysql_query("INSERT INTO `user_profile` (`user_id`, `name`, `mobile`, `email`, `password`,`permission`) VALUES ('$user_id','$name','$mob','$email','$pass','" . $checkBox . "')")or die (mysql_error() );

		if($sql==true)
		{
			echo "1";
		}
		else{
			 	echo "2";
			}	
?>