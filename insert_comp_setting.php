<?php 
// var_dump($_POST);
include "config.php";

  $user_id = $_POST['user_id'];
  $name = $_POST['txt_name'];
  $addr = $_POST['txt_saddr'];
  $phone = $_POST['txt_cphone'];
  $email = $_POST['txt_cemail'];
  $web = $_POST['txt_cweb'];
  $terms = $_POST['txt_terms'];
  $txt_gstin = $_POST['txt_gstin'];
  $txt_bank = $_POST['txt_bank'];
  $txt_panno = $_POST['txt_panno'];
  $state_code = $_POST['state_code'];
  $txt_state = $_POST['txt_state'];
  $file = $_FILES['logo']['name'];

if($file!=null || $file='')
{
    if(isset($_FILES["logo"]["name"]))  
      {   

         $target_dir ="img/";  
         $imageFileType = pathinfo($_FILES["logo"]["name"],PATHINFO_EXTENSION);    
         $target_file = $target_dir.$_FILES["logo"]["name"];   
         
             if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)){      
                $img=$target_file;            
            }else{        
              echo "Sorry, there was an error uploading your file.";      
            }       
      }

    $sql = mysql_query("INSERT INTO `company` (`user_id`,`company_name`,`company_email`,`company_phone`,`gst_no`,`company_url`,`company_address`,`logo`,`terms`,`bank_details`,`pan_no`,`state_code`,`state`) VALUES ('$user_id','$name','$email','$phone','$txt_gstin','$web','$addr','$img','$terms','$txt_bank','$txt_panno','$state_code','$txt_state')")or die(mysql_error($connection));

          if($sql==true)
            {
              echo "1";
            }
            else
            {
               echo "2";
            }
}else{
      $sql1 = mysql_query("INSERT INTO `company` (`user_id`,`company_name`,`company_email`,`company_phone`,`gst_no`,`company_url`,`company_address`,`terms`,`bank_details`,`pan_no`,`state_code`,`state`) VALUES ('$user_id','$name','$email','$phone','$txt_gstin','$web','$addr','$terms','$txt_bank','$txt_panno','$state_code','$txt_state')")or die(mysql_error($connection));

          if($sql1==true)
           {
              echo "1";
            }
            else
            {
               echo "2";
            }
}

?>