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
    
    $sql = 'SELECT customer_name,customer_phone,customer_email FROM cust WHERE DAY(customer_dob)=DAY(curdate()) AND MONTH(customer_dob)=MONTH(curdate())';
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result)) {

		$mailid=$row["customer_email"];
		$number=$row["customer_phone"];
		$headers = "From: ezyloan@xeoinfotech.com" . "\r\n";
		$message=urlencode("Dear ".$row["customer_name"].", EZY-LOAN.COM wishes you a Very Happy Birthday and a Great Year ahead!");
		$message1="Dear ".$row["customer_name"].", EZY-LOAN.COM wishes you a Very Happy Birthday and a Great Year ahead!";
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