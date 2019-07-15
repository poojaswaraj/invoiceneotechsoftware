<?php 
	include "config.php";

$user_id= $_POST['user_id'];
$sub_id=$_POST['sub_us_id'];
$sub_us_ty=$_POST['sub_us_ty'];
// $po_no =$_POST['po_no'];
// $po_date =$_POST['po_date'];
// $proj_name= $_POST['proj_name'];

$data = $_POST['data'];
$txt_cname = ucwords($_POST['txt_cname']);
$txt_cleagal_id = $_POST['txt_cleagal_id'];
$txt_gstno = $_POST['txt_gstno'];
$txt_cperson = $_POST['txt_cperson'];
$txt_cemail = $_POST['txt_cemail'];
$txt_iaddr = $_POST['txt_iaddr'];
$txt_saddr = $_POST['txt_saddr'];
$select_series = $_POST['select_series'];
// $idate = $_POST['idate'];
$txt_state = $_POST['txt_state'];
$txt_code = $_POST['txt_code'];
$txt_scperson = $_POST['txt_scperson'];
$txt_scemail = $_POST['txt_scemail'];
$txt_sstate = $_POST['txt_sstate'];
$txt_scode = $_POST['txt_scode'];
// $ddate = $_POST['ddate'];
$idate=strtotime($_POST['idate']); 
$idate=date("Y-m-d",$idate);

$txt_product = $_POST['txt_product'];
$txt_desc = $_POST['txt_desc'];
$txt_cost = $_POST['txt_cost'];
$txt_qty = $_POST['txt_qty'];
$select_tax = $_POST['select_tax'];
$txt_discount = $_POST['txt_discount'];
$txt_price = $_POST['txt_price'];

$txt_base= $_POST['txt_base'];
$txt_total_discount= $_POST['txt_total_discount'];
$txt_subtotal= $_POST['txt_subtotal'];
$txt_total_tax= $_POST['txt_total_tax'];
$txt_total= $_POST['txt_total'];
$txt_notes = $_POST['txt_notes'];
$txt_terms = $_POST['txt_terms'];
$txt_bank = $_POST['txt_bank'];

// $word = $_POST['word'];

$dt=date('y-m-d H:i:s');

$ssid=$_POST['txt_session'];

$string = str_replace(' ', '', $txt_cname);

$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{
				
$sql1 = mysql_query("UPDATE customer SET `user_id`='$sub_id',`sub_user_id`='$user_id',`name`='$txt_cname',`name_slug`='$string',`identification`='$txt_cleagal_id',`contact_person`='$txt_cperson',`email`='$txt_cemail',`invoicing_address`='$txt_iaddr',`shipping_address`='$txt_saddr',`gst_no`='$txt_gstno',`invoice_state`='$txt_state',`in_state_code`='$txt_code',`ship_cont_person`='$txt_scperson',`ship_email`='$txt_scemail',`ship_state`='$txt_sstate',`ship_state_code`='$txt_scode' WHERE id='$data'")or die(mysql_error($connection));

	if($sql1==true)
	{
		
			function convertNumber($txt_total)
				{
				    list($integer) = explode(".", (string) $txt_total);

				    $output = "";

				    if ($integer{0} == "-")
				    {
				        $output = "negative ";
				        $integer    = ltrim($integer, "-");
				    }
				    else if ($integer{0} == "+")
				    {
				        $output = "positive ";
				        $integer    = ltrim($integer, "+");
				    }

				    if ($integer{0} == "0")
				    {
				        $output .= "Zero";
				    }
				    else
				    {
				        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
				        $group   = rtrim(chunk_split($integer, 3, " "), " ");
				        $groups  = explode(" ", $group);

				        $groups2 = array();
				        foreach ($groups as $g)
				        {
				            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
				        }

				        for ($z = 0; $z < count($groups2); $z++)
				        {
				            if ($groups2[$z] != "")
				            {
				                $output .= $groups2[$z] . convertGroup(11 - $z) . (
				                        $z < 11
				                        && !array_search('', array_slice($groups2, $z + 1, -1))
				                        && $groups2[11] != ''
				                        && $groups[11]{0} == '0'
				                            ? " and "
				                            : ", "
				                    );
				            }
				        }

				        $output = rtrim($output, ", ");
				    }

				    // if ($fraction > 0)
				    // {
				    //     $output .= " Rupees";
				    //     for ($i = 0; $i < strlen($fraction); $i++)
				    //     {
				    //         $output .= " " . convertDigit($fraction{$i});
				    //     }
				    // }

				    return $output;
				}

				function convertGroup($index)
				{
				    switch ($index)
				    {
				        case 11:
				            return " Decillion";
				        case 10:
				            return " Nonillion";
				        case 9:
				            return " Octillion";
				        case 8:
				            return " Septillion";
				        case 7:
				            return " Sextillion";
				        case 6:
				            return " Quintrillion";
				        case 5:
				            return " Quadrillion";
				        case 4:
				            return " Trillion";
				        case 3:
				            return " Billion";
				        case 2:
				            return " Million";
				        case 1:
				            return " Thousand";
				        case 0:
				            return "";
				    }
				}

				function convertThreeDigit($digit1, $digit2, $digit3)
				{
				    $buffer = "";

				    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
				    {
				        return "";
				    }

				    if ($digit1 != "0")
				    {
				        $buffer .= convertDigit($digit1) . " Hundred";
				        if ($digit2 != "0" || $digit3 != "0")
				        {
				            $buffer .= " and ";
				        }
				    }

				    if ($digit2 != "0")
				    {
				        $buffer .= convertTwoDigit($digit2, $digit3);
				    }
				    else if ($digit3 != "0")
				    {
				        $buffer .= convertDigit($digit3);
				    }

				    return $buffer;
				}

				function convertTwoDigit($digit1, $digit2)
				{
				    if ($digit2 == "0")
				    {
				        switch ($digit1)
				        {
				            case "1":
				                return "Ten";
				            case "2":
				                return "Twenty";
				            case "3":
				                return "Thirty";
				            case "4":
				                return "Forty";
				            case "5":
				                return "Fifty";
				            case "6":
				                return "Sixty";
				            case "7":
				                return "Seventy";
				            case "8":
				                return "Eighty";
				            case "9":
				                return "Ninety";
				        }
				    } else if ($digit1 == "1")
				    {
				        switch ($digit2)
				        {
				            case "1":
				                return "Eleven";
				            case "2":
				                return "Twelve";
				            case "3":
				                return "Thirteen";
				            case "4":
				                return "Fourteen";
				            case "5":
				                return "Fifteen";
				            case "6":
				                return "Sixteen";
				            case "7":
				                return "Seventeen";
				            case "8":
				                return "Eighteen";
				            case "9":
				                return "Nineteen";
				        }
				    } else
				    {
				        $temp = convertDigit($digit2);
				        switch ($digit1)
				        {
				            case "2":
				                return "Twenty-$temp";
				            case "3":
				                return "Thirty-$temp";
				            case "4":
				                return "Forty-$temp";
				            case "5":
				                return "Fifty-$temp";
				            case "6":
				                return "Sixty-$temp";
				            case "7":
				                return "Seventy-$temp";
				            case "8":
				                return "Eighty-$temp";
				            case "9":
				                return "Ninety-$temp";
				        }
				    }
				}

				function convertDigit($digit)
				{
				    switch ($digit)
				    {
				        case "0":
				            return "Zero";
				        case "1":
				            return "One";
				        case "2":
				            return "Two";
				        case "3":
				            return "Three";
				        case "4":
				            return "Four";
				        case "5":
				            return "Five";
				        case "6":
				            return "Six";
				        case "7":
				            return "Seven";
				        case "8":
				            return "Eight";
				        case "9":
				            return "Nine";
				    }
				}

				 $num = $txt_total;
				 $test = convertNumber($num);


	   $sql4 = mysql_query("UPDATE common SET `user_id`='$sub_id',`sub_user_id`='$user_id', `customer_name`='$txt_cname',`customer_identification`='$txt_cleagal_id',`customer_email`='$txt_cemail',`invoicing_address`='$txt_iaddr',`shipping_address`='$txt_saddr',`contact_person`='$txt_cperson',`cust_gst_no`='$txt_gstno',`terms`='$txt_terms',`bank_details`='$txt_bank',`notes`='$txt_notes',`base_amount`='$txt_base',`discount_amount`='$txt_total_discount',`net_amount`='$txt_subtotal',`tax_amount`='$txt_total_tax',`gross_amount`='$txt_total',`amt_words`='$test',`status`='Pending',`type`='Estimate',`issue_date`='$idate',`updated_at`='$dt',`invoice_state`='$txt_state',`in_state_code`='$txt_code',`ship_cont_person`='$txt_scperson',`ship_email`='$txt_scemail',`ship_state`='$txt_sstate',`ship_state_code`='$txt_scode' WHERE id='$data'")or die(mysql_error($connection));
 			
 			 
				if($sql4==true)
				{
				 // $c_id = mysql_insert_id();
					if($sql4==true)
						{
							echo "1";
						}
						else
						{
							echo "2";
						}

				}
	
 }
}//end of if loop user
else{
	$sql1 = mysql_query("UPDATE customer SET `user_id`='$user_id',`sub_user_id`='$sub_id',`name`='$txt_cname',`name_slug`='$string',`identification`='$txt_cleagal_id',`contact_person`='$txt_cperson',`email`='$txt_cemail',`invoicing_address`='$txt_iaddr',`shipping_address`='$txt_saddr',`gst_no`='$txt_gstno',`invoice_state`='$txt_state',`in_state_code`='$txt_code',`ship_cont_person`='$txt_scperson',`ship_email`='$txt_scemail',`ship_state`='$txt_sstate',`ship_state_code`='$txt_scode' WHERE id='$data'")or die(mysql_error($connection));

	if($sql1==true)
	{
		
			function convertNumber($txt_total)
				{
				    list($integer) = explode(".", (string) $txt_total);

				    $output = "";

				    if ($integer{0} == "-")
				    {
				        $output = "negative ";
				        $integer    = ltrim($integer, "-");
				    }
				    else if ($integer{0} == "+")
				    {
				        $output = "positive ";
				        $integer    = ltrim($integer, "+");
				    }

				    if ($integer{0} == "0")
				    {
				        $output .= "Zero";
				    }
				    else
				    {
				        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
				        $group   = rtrim(chunk_split($integer, 3, " "), " ");
				        $groups  = explode(" ", $group);

				        $groups2 = array();
				        foreach ($groups as $g)
				        {
				            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
				        }

				        for ($z = 0; $z < count($groups2); $z++)
				        {
				            if ($groups2[$z] != "")
				            {
				                $output .= $groups2[$z] . convertGroup(11 - $z) . (
				                        $z < 11
				                        && !array_search('', array_slice($groups2, $z + 1, -1))
				                        && $groups2[11] != ''
				                        && $groups[11]{0} == '0'
				                            ? " and "
				                            : ", "
				                    );
				            }
				        }

				        $output = rtrim($output, ", ");
				    }

				    // if ($fraction > 0)
				    // {
				    //     $output .= " Rupees";
				    //     for ($i = 0; $i < strlen($fraction); $i++)
				    //     {
				    //         $output .= " " . convertDigit($fraction{$i});
				    //     }
				    // }

				    return $output;
				}

				function convertGroup($index)
				{
				    switch ($index)
				    {
				        case 11:
				            return " Decillion";
				        case 10:
				            return " Nonillion";
				        case 9:
				            return " Octillion";
				        case 8:
				            return " Septillion";
				        case 7:
				            return " Sextillion";
				        case 6:
				            return " Quintrillion";
				        case 5:
				            return " Quadrillion";
				        case 4:
				            return " Trillion";
				        case 3:
				            return " Billion";
				        case 2:
				            return " Million";
				        case 1:
				            return " Thousand";
				        case 0:
				            return "";
				    }
				}

				function convertThreeDigit($digit1, $digit2, $digit3)
				{
				    $buffer = "";

				    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
				    {
				        return "";
				    }

				    if ($digit1 != "0")
				    {
				        $buffer .= convertDigit($digit1) . " Hundred";
				        if ($digit2 != "0" || $digit3 != "0")
				        {
				            $buffer .= " and ";
				        }
				    }

				    if ($digit2 != "0")
				    {
				        $buffer .= convertTwoDigit($digit2, $digit3);
				    }
				    else if ($digit3 != "0")
				    {
				        $buffer .= convertDigit($digit3);
				    }

				    return $buffer;
				}

				function convertTwoDigit($digit1, $digit2)
				{
				    if ($digit2 == "0")
				    {
				        switch ($digit1)
				        {
				            case "1":
				                return "Ten";
				            case "2":
				                return "Twenty";
				            case "3":
				                return "Thirty";
				            case "4":
				                return "Forty";
				            case "5":
				                return "Fifty";
				            case "6":
				                return "Sixty";
				            case "7":
				                return "Seventy";
				            case "8":
				                return "Eighty";
				            case "9":
				                return "Ninety";
				        }
				    } else if ($digit1 == "1")
				    {
				        switch ($digit2)
				        {
				            case "1":
				                return "Eleven";
				            case "2":
				                return "Twelve";
				            case "3":
				                return "Thirteen";
				            case "4":
				                return "Fourteen";
				            case "5":
				                return "Fifteen";
				            case "6":
				                return "Sixteen";
				            case "7":
				                return "Seventeen";
				            case "8":
				                return "Eighteen";
				            case "9":
				                return "Nineteen";
				        }
				    } else
				    {
				        $temp = convertDigit($digit2);
				        switch ($digit1)
				        {
				            case "2":
				                return "Twenty-$temp";
				            case "3":
				                return "Thirty-$temp";
				            case "4":
				                return "Forty-$temp";
				            case "5":
				                return "Fifty-$temp";
				            case "6":
				                return "Sixty-$temp";
				            case "7":
				                return "Seventy-$temp";
				            case "8":
				                return "Eighty-$temp";
				            case "9":
				                return "Ninety-$temp";
				        }
				    }
				}

				function convertDigit($digit)
				{
				    switch ($digit)
				    {
				        case "0":
				            return "Zero";
				        case "1":
				            return "One";
				        case "2":
				            return "Two";
				        case "3":
				            return "Three";
				        case "4":
				            return "Four";
				        case "5":
				            return "Five";
				        case "6":
				            return "Six";
				        case "7":
				            return "Seven";
				        case "8":
				            return "Eight";
				        case "9":
				            return "Nine";
				    }
				}

				 $num = $txt_total;
				 $test = convertNumber($num);


	   $sql4 = mysql_query("UPDATE common SET `user_id`='$user_id',`sub_user_id`='$sub_id', `customer_name`='$txt_cname',`customer_identification`='$txt_cleagal_id',`customer_email`='$txt_cemail',`invoicing_address`='$txt_iaddr',`shipping_address`='$txt_saddr',`contact_person`='$txt_cperson',`cust_gst_no`='$txt_gstno',`terms`='$txt_terms',`bank_details`='$txt_bank',`notes`='$txt_notes',`base_amount`='$txt_base',`discount_amount`='$txt_total_discount',`net_amount`='$txt_subtotal',`tax_amount`='$txt_total_tax',`gross_amount`='$txt_total',`amt_words`='$test',`status`='Pending',`type`='Estimate',`issue_date`='$idate',`updated_at`='$dt',`invoice_state`='$txt_state',`in_state_code`='$txt_code',`ship_cont_person`='$txt_scperson',`ship_email`='$txt_scemail',`ship_state`='$txt_sstate',`ship_state_code`='$txt_scode' WHERE id='$data'")or die(mysql_error($connection));
 			
 			 
				if($sql4==true)
				{
				 // $c_id = mysql_insert_id();
					if($sql4==true)
						{
							echo "3";
						}
						else
						{
							echo "2";
						}

				}
	
 }
}

 ?>