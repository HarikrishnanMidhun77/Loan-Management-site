<?php

include 'config.php';
require 'php-excel.class.php';

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

    $sql = 'SELECT * FROM cust';
    $result = mysqli_query($conn, $sql);
    $b=array("ID","Customer Name","Number","Bank Name","Loan Type","Loan Number","Loan Amount(Rs)","Tenure(yrs)","EMI Amount(Rs)","EMI Date","Location","E-Mail","Date of Birth");
    $a = array($b);
   // $x=array();
while($row = mysqli_fetch_array($result)) {
    $x=array($row["id"],$row["customer_name"],$row["customer_phone"],$row["bank_name"],$row["loan_type"],$row["loan_number"],$row["loan_amount"],$row["loan_tenure"],$row["emi_amount"],$row["emi_date"],$row["customer_location"],$row["customer_email"],$row["customer_dob"]);
    array_push($a,$x);
    $x=("");
    //print_r($a);
}
//print_r($a);
$xls = new Excel_XML('UTF-8', false, 'EzyLoans Database Spreadsheet');
$xls->addArray($a);
$xls->generateXML('EzyLoans Database Spreadsheet');
?>