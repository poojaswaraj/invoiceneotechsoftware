<?php
include "config.php";

		$email=$_POST['email'];
		
		$query = mysql_query("SELECT b.password, a.* FROM `user_profile` a INNER JOIN  `user` b ON a.user_id=b.id WHERE a.email='".$email."'");
		$row=mysql_fetch_array($query);

		$password=$row['password'];

		$cnt = mysql_num_rows($query);
		if ($cnt == 1) 
		{

         	 $body="Your New Password is.<br><b>Password:</b>&nbsp;".$password."<br>";      	 	
         	 	
				require_once('PHPMailer_5.2.4/class.phpmailer.php');
				$mail= new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug=1;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='';
				$mail->Host = "mail.e-bc.in";
				$mail->Port = 587;
				$mail->IsHTML (true);
				$mail->Username = 'cs@e-bc.in';
				$mail->Password = 'cs@2017';
				$mail->SetFrom("cs@e-bc.in");
				$mail->Subject = "Billing Software Password";
				// $mail->Body ="test";
				$mail->MsgHTML($body);
				$mail->AddAddress($email);

				if(!$mail->Send()) {
					// echo "Mailer Error" . $mail->ErrorInfo;
					echo "2";
				}
				else{
					echo "1";
				}
			
		}
		else 
		{
			echo "2";
		}


?>