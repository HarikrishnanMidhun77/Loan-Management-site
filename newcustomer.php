<!DOCTYPE html>
<html>
<body>

 <?php
 $custname = filter_input(INPUT_POST, 'customer_name');
 $custphone = filter_input(INPUT_POST, 'customer_phone');
 $loantype = filter_input(INPUT_POST, 'loan_type');
 $loannum = filter_input(INPUT_POST, 'loan_number');
 $loanamt = filter_input(INPUT_POST,'loan_amount');
 $loanten = filter_input(INPUT_POST, 'loan_tenure');
 $emiamt = filter_input(INPUT_POST, 'emi_amount');
 $emidate = filter_input(INPUT_POST, 'emi_date');
 $custloc = filter_input(INPUT_POST, 'customer_location');
 $custmail = filter_input(INPUT_POST, 'customer_email');
 $custdob = filter_input(INPUT_POST, 'customer_dob');
 $bankname=filter_input(INPUT_POST, 'bank_name'); 

 if (!empty($custname)){
if (!empty($custphone)){
  include 'config.php';

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO cust (customer_name, customer_phone, loan_type, loan_number, loan_amount, loan_tenure, emi_amount, emi_date, customer_location, customer_email, customer_dob, bank_name)
  values ('$custname','$custphone','$loantype','$loannum','$loanamt','$loanten','$emiamt','$emidate','$custloc', '$custmail', '$custdob', '$bankname')";
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
    header( "refresh:2;url=dashboard.php" );
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
}
else{
  echo "Customer Phone should not be empty";
  die();
}
 }
 else{
  echo "Customer Name should not be empty";
  die();
 }
 ?>
 </body>
 </html>