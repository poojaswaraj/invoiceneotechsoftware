<?php
include "config.php";

		$comp_name=$_POST['comp_name'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$pass=$_POST['pass'];
		$dt=date('Y-m-d');
		$hash = md5( rand(0,1000) );
			
		$sql=mysql_query("SELECT * FROM user WHERE username='$email' or comp_name='$comp_name'")or die(mysql_error());
		$row=mysql_fetch_array($sql);
		$count=mysql_num_rows($sql);
		if($count>0)
			{
				echo "2";		
			}
			else
			{	
			$query1 = mysql_query("INSERT INTO `user`(`comp_name`,`name`,`username`,`password`,`contact`,`created_at`,`hash`,`end_date`,`start_date`) VALUES ('$comp_name','$name','$email','$pass','$contact','$dt','$hash',CURDATE() + INTERVAL 14 DAY,'$dt')")or die(mysql_error($connection));
			
				if($query1==true)
					{
			 	$last=mysql_insert_id();

			 	$query = mysql_query("INSERT INTO `company`(`user_id`,`company_name`,`company_email`,`company_phone`) VALUES ('$last','$comp_name','$email','$contact')")or die(mysql_error($connection));
			 	if($query==true)
			 	{

$body='
  <style>
body{
    background: #F9F9F9; 
    font: 14px "Lucida Grande";
    color: #464646; 
}

h3{
    margin-top: 20px;
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 1.1;
	font-size: 20px;
}

.panel-heading{
    display: block;
    width:585px;
    background-color: #6495ED;
    text-align: center;
 }
 
#wrap{
    background: none; 
    width: 615px; 
    margin: 0 auto; 
    margin-top: 50px; 
    border: none; 
    height: 500px; 
    background-color: #f6f6f6; 
}
 
#wrap h3
{ 
    display: block;
}
 
input{
    font: normal 16px Georgia; 
    border: 1px solid #DFDFDF; 
    padding: 8px;
}

h3{
    padding: -24px;
	font-size: 25px;
    font-weight: bold;
}
label
{
     text-align: left;
     word-spacing: 4px;
     font-family: "Arail", Times, serif;
	font-size: 16px;
	font-weight: bold;
	
}

.btn-primary{
	width: 232px;
    color: #fff;
    text-align: center;
    margin: 0px 0px 0px 176%;
    background-color: #6495ED;
    padding: 12px;
}
.panel-primary{
   border-width:0px;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    margin-left: 500px;
    margin-right: 337px;
    margin-top: 160px;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 12px;
}
.col-md-2 {
    width: 16.66666667%;
}

.col-md-12 {
    width: 100%;
}
.box{
	padding: 10px;
}
</style>



  <div id="wrap">
        
    
          <div class="panel-heading">  <h3 style="color:white;">Billing Software </h3></div>
          <div class="panel-body"></div>
      
        

         <label align= "right"; style="font-family:"Arail";"> Please Confirm Subscription</label>
        
        <div class="panel-body"></div>
        <div class="col-md-3">
        <label>Dear <font color="#6495ED"> '.$name .' </font>,</label>
        <div class="panel-body"></div>
        <div class="col-md-6">
        <a href="http://invoice.itfreedom.in/login_verify.php?hash='.$hash.'" class="btn btn-primary" value="Confirm E-mail" align="center" style="width:257px; margin-left: 125px;">Confirm E-mail</a>
           <div class="panel-body"></div>
        </div>
        </div>
     
     <div class="panel-body"></div>
        <label>
           Thanks for Subscribing to the Billing Software. To give us permission to send you
            valuable information and to complete your subscription, you need to confirm your email by 
            Clicking the link above. Its fast and Easy! <br/>
            <div class="panel-body"></div>
            If you receive this email by mistake, simply delete it. You  won’t be subscribed if you don’t click the confirmation link above. </br>
            <div class="panel-body"></div>
         For any Question, Contact<br/>
         <label ><font color="#6495ED">admin@e-bc.in</font></label>
        </label>         

       <div class="panel-body"></div>
    
   </div>

    <!-- end wrap div -->
</body>';

    
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
				$mail->Subject = "Registration For Billing Software";
				// $mail->Body ="test";
				$mail->MsgHTML($body);
				$mail->AddAddress('admin@e-bc.in');
				$mail->Addcc($email);

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
		}
	}

?>