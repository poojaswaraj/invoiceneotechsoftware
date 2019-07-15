<?php 
include "config.php";
 	$data= $_POST['data1'];
    $name = $_POST['txt_name'];
    $addr = $_POST['txt_saddr'];
    $phone = $_POST['txt_cphone'];
    $email = $_POST['txt_cemail'];
    $web = $_POST['txt_cweb'];
    $terms = $_POST['txt_terms'];
    $txt_bank = $_POST['txt_bank'];
    $txt_panno = $_POST['txt_panno'];
    $state_code = $_POST['state_code'];
    $txt_state = $_POST['txt_state'];

    $file=$_FILES["logo"]["name"];

if($file!=null || $file='')
{
	if(isset($_FILES["logo"]["name"]))  
	{   
	  $target_dir ="img/";  
	  $imageFileType = pathinfo($_FILES["logo"]["name"],PATHINFO_EXTENSION);    
	  $target_file = $target_dir.$_FILES["logo"]["name"];   

       if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) 
        {      
            $img=$target_file;            
        } 
       else{        
            echo "Sorry, there was an error uploading your file.";      
        }       
	}

	$sql=mysql_query("UPDATE company SET company_name='".$_POST['txt_name']."',company_email='".$_POST['txt_cemail']."',company_phone='".$_POST['txt_cphone']."',gst_no='".$_POST['txt_gstin']."',company_address='".$_POST['txt_saddr']."',company_url='".$_POST['txt_cweb']."',terms='".$_POST['txt_terms']."', logo='$img',bank_details='".$_POST['txt_bank']."',pan_no='".$_POST['txt_panno']."',state_code='".$_POST['state_code']."',state='".$_POST['txt_state']."' where id='$data'")or die(mysql_error($connection));

      	if($sql==true)
          {
            echo "1";
          }
          else{
          	echo "2";
          }
}
else{

   $sql1=mysql_query("UPDATE company SET company_name='".$_POST['txt_name']."',company_email='".$_POST['txt_cemail']."',company_phone='".$_POST['txt_cphone']."',gst_no='".$_POST['txt_gstin']."',company_address='".$_POST['txt_saddr']."',company_url='".$_POST['txt_cweb']."',terms='".$_POST['txt_terms']."',bank_details='".$_POST['txt_bank']."',pan_no='".$_POST['txt_panno']."',state_code='".$_POST['state_code']."',state='".$_POST['txt_state']."' where id='$data'")or die(mysql_error($connection));

        if($sql1==true)
          {
            echo "1";
          }
          else{
          	echo "2";
          }
}

 ?>