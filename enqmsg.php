 <!DOCTYPE html>
<html>
<body>

<?php
	 
   
    $message2=filter_input(INPUT_POST,"msg");
    //$message=$message2;
    $customer=$message2;

    if($message2=='')
    {
        header("Location: enq.php"); 
        exit;
    }
else{
	    $number=filter_input(INPUT_POST,"phone");
		$admin_number="9746847664";
		$mailid=filter_input(INPUT_POST,"email");
		$name=filter_input(INPUT_POST,"name");
		$location=filter_input(INPUT_POST,"location");
		$type=filter_input(INPUT_POST,"type");

		$headers = "From: info@ezy-loan.com" . "\r\n";
		//$message=urlencode("Dear Admin,\r\n".$name." has sent you a query. Ph: ".$number." Location: ".$location." Loan Type: ".$type);
		//$message1="Dear Admin,\r\n".$name." has sent you a query.\r\n Ph:".$number."\r\n Location: ".$location."\r\n Loan Type: ".$type;
		//$message1=wordwrap($message, 70, "\r\n");
		//$customer=urlencode("Dear ".$name.", Greetings from EZY-LOAN.COM. Our customer relationship officer will contact you soon regarding your query. Thank you.");
		//$message2="Dear ".$name.", Greetings from EZY-LOAN.COM. Our customer relationship officer will contact you soon regarding your query. Thank you.";
		
		mail($mailid, "From EZY-Loan.com", $message2,$headers);
		//mail("info@ezy-loan.com","Query from Customer",$message1,$headers);
		
		$customer=preg_replace('/\s+/', '%20', $customer);
		//$message=preg_replace('/\s+/', '%20', $message);	

	    $link="http://sms.xeoinfotech.com/httpapi/httpapi?token=6d74f0a3e03321d9fcfa5fb997607106&sender=newsen&number=".$number."&route=2"."&type=1&sms=".$customer;
	    $ch = curl_init($link);
	    $data = curl_exec($ch);
	    //$link="http://sms.xeoinfotech.com/httpapi/httpapi?token=6d74f0a3e03321d9fcfa5fb997607106&sender=newsen&number=".$admin_number."&route=2"."&type=1&sms=".$message;
	    //$ch = curl_init($link);
	    //$data = curl_exec($ch);
	    header("Location: enq.php"); 
        exit;
    }
?>
</body>
</html>
