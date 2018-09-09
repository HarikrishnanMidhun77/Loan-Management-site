<?php
$msg="We are good";
$msg=preg_replace('/\s+/', '%20', $msg);
$link="http://sms.xeoinfotech.com/httpapi/httpapi?token=6d74f0a3e03321d9fcfa5fb997607106&sender=newsen&number=9495971412&route=2&type=1&sms=".$msg;
	$ch = curl_init($link);
	$data = curl_exec($ch);
?>