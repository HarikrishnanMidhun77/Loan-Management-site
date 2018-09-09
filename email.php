 <!DOCTYPE html>
<html>
<body>

<?php

include 'config.php';

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

else{
    
    $sql = 'SELECT customer_name,emi_amount, bank_name, loan_amount, emi_date, customer_email, customer_phone, loan_number FROM cust WHERE EXTRACT(DAY FROM emi_date)= EXTRACT(DAY from DATE_ADD(curdate(), INTERVAL 2 DAY))';
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result)) {

		$mailid=$row["customer_email"];
		$number=$row["customer_phone"];
		$headers = "From: ezyloan@xeoinfotech.com" . "\r\n";
		$message=urlencode("Dear ".$row["customer_name"].", your EMI of Rs.".$row["emi_amount"]." for ".$row["bank_name"]." Loan ".$row["loan_number"]." is due on ".$row["emi_date"]."\r\n, Pls pay on time to avoid penalty. For queries call +919746847664. EZY-LOAN.COM");
		$message1="Dear ".$row["customer_name"].", your EMI of Rs. ".$row["emi_amount"]." for ".$row["bank_name"]." Loan ".$row["loan_number"]." is due on ".$row["emi_date"].", Pls pay on time to avoid penalty. For queries call +919746847664. EZY-LOAN.COM";
		$message=preg_replace('/\s+/', '%20', $message);
		mail($mailid,"Reminder from EZY-LOAN.com",$message1,$headers);
	$link="http://sms.xeoinfotech.com/httpapi/httpapi?token=6d74f0a3e03321d9fcfa5fb997607106&sender=newsen&number=".$number."&route=2"."&type=1&sms=".$message;
	$ch = curl_init($link);
	$data = curl_exec($ch);
 }
}

?>
</body>
</html>