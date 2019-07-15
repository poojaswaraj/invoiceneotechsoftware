<?php
session_start(); 
include "config.php";
$error=''; 
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query = mysql_query("SELECT * FROM `user` WHERE username='".$username."' AND password='".$password."'");
		$row=mysql_fetch_array($query);
		$active=$row['is_active'];
		$admin=$row['is_super_admin'];
		$id=$row['id'];
		
		$query1 = mysql_query("SELECT * FROM `user` WHERE start_date <= now() AND end_date >= now() AND id='".$id."'");	
		$rowdate=mysql_fetch_array($query1);
		  
		  
		if($admin=='1' && $active=='1')
		{
			$cnt = mysql_num_rows($query);
			if ($cnt == 1)  
			{
				$_SESSION['login_user']=$row['id']; 
				$_SESSION['user_type']=$row['type']; 
				echo "1";
			}
			else 
			{
				echo "2";
			}
		}
		else if($active=='1')
		{
			if($rowdate==true)
			{
				$cnt = mysql_num_rows($query);
				if ($cnt == 1) 
				{
					$_SESSION['login_user']=$row['id']; 
					$_SESSION['user_type']=$row['type']; 

					echo "1";
				}
				else 
				{
					echo "2";
				}
			}
			else 
			{
				echo "5";
			}
		}
		else if($active=='0')
		{
			$cnt = mysql_num_rows($query);
			if ($cnt == 1) 
			{
				$_SESSION['login_user']=$row['id']; 
				$_SESSION['user_type']=$row['type']; 

				echo "4";
			}
			else 
			{
				echo "2";
			}
		}
		else{

			$query = mysql_query("SELECT * FROM `user_profile` WHERE email='".$username."' AND password='".$password."'");
			$row=mysql_fetch_array($query);
			$id=$row['user_id'];
			
			$query12 = mysql_query("SELECT * FROM `user`  WHERE id='".$id."'");
			$row12=mysql_fetch_array($query12);
			$sup_adm=$row12['is_super_admin'];

			if($sup_adm=='0')
			{
				$query1 = mysql_query("SELECT * FROM `user`  WHERE start_date <= now() AND end_date >= now() AND id='".$id."'");	
				$rowdate=mysql_fetch_array($query1);
				if($rowdate==true)
				{
					$cnt = mysql_num_rows($query);
					if ($cnt == 1) 
					{
						$_SESSION['login_user']=$row['id'];
						$_SESSION['user_type']=$row['type']; 
						echo "3";
					}
					else 
					{
						echo "2";
					}
				}
				else 
				{
					echo "6";
				}
			}
			else{
				$cnt = mysql_num_rows($query);
					if ($cnt == 1) 
					{
						$_SESSION['login_user']=$row['id'];
						$_SESSION['user_type']=$row['type']; 
						echo "3";
					}
					else 
					{
						echo "2";
					}
			}
		}
	
		
?>