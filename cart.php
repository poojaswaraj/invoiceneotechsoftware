<?php
  
if(isset($_POST['invoice']))
{
   $s= rand(0,9);
     $qq= mysql_query("INSERT INTO tbl_session (session_id) VALUES ('$s')")or die(mysql_error($connection));
     if($qq==true)
     {
		   $_SESSION['session_id']=$s;
		   $sess= $_SESSION['session_id'];
     	// $last_id=mysql_insert_id();
	     $query=mysql_query("SELECT * FROM tbl_session WHERE session_id='$sess'");
         $row=mysql_fetch_array($query);
         $cnt = mysql_num_rows($query);
			if ($cnt == 1) 
			{

			 $_SESSION['cart_id']=$row['session_id']; 
				header("location: dashboard.php?page=new_invoice.php"); 
			}
			else 
			{
				header('location:index.php?status=1');
			}
  }
}
?> 