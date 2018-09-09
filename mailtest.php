<?php
//$message1="Dear ".$row["customer_name"].", your EMI of Rs. ".$row["emi_amount"]." for ".$row["bank_name"]." Loan ".$row["loan_number"]." is due on ".$row["emi_date"].", Pls pay on time to avoid penalty. For queries call +919746847664. EZY-LOAN.COM";
/*$message1="hello";
$message1=preg_replace('/\s+/', '%20', $message1);
mail($mailid,"Reminder from EZY-LOAN.com",$message1,$headers);


$to = "harikrishnanthrippekulam@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

$r=mail($to,$subject,$txt,$headers);
echo $r;
echo "hello";*/

echo "hello";
$r=mail('harikrishnanmidhun77@gmail.com', 'the subject', 'the message', null,
   '-finfo@ezy-loan.com');
print $r;
?>