<a href="">
<?php
include "config.php";
 if(isset($_GET["eid"]))
    {
       $id = $_GET["eid"];
       $query = mysql_query("SELECT * FROM common WHERE id='$id'")or die(mysql_error($connection));
          $data=mysql_fetch_array($query);

          $email=$data['customer_email'];

// $body=file_get_contents('attach_file.php');
        $file_to_attach = 'attach_file.php';

          $body="Please Find the Attachment.";
    
require_once('PHPMailer_5.2.4/class.phpmailer.php');
$mail= new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug=1;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host = "bh-29.webhostbox.net";
$mail->Port = 465;
$mail->IsHTML (true);
$mail->Username = 'amit@e-bc.in';
$mail->Password = 'amit123';
$mail->SetFrom("amit@e-bc.in");
$mail->Subject = "Hello World - Test Mail";
// $mail->Body ="test";
$mail->MsgHTML($body);
$mail->AddAddress($email);

$mail->AddAttachment( $file_to_attach , 'reciept.pdf' );

if(!$mail->Send()) {
	echo "Mailer Error" . $mail->ErrorInfo;
}
else{
	echo"Message has been sent";
}
}
else{
	echo "error";
}
?>
