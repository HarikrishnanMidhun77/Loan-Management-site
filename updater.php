 <!DOCTYPE html>
<html>
<body>

 <?php
$cid=$_GET['row_id'];
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
  $sql = "UPDATE cust SET customer_name='$custname', customer_phone='$custphone',loan_type='$loantype', loan_number='$loannum', loan_amount='$loanamt', loan_tenure='$loanten', emi_amount='$emiamt', emi_date='$emidate', customer_location='$custloc', customer_email='$custmail', customer_dob='$custdob', bank_name='$bankname' WHERE id=$cid";

  if ($conn->query($sql)){
    echo "record has been updated sucessfully";
    header( "Location:customers.php" );
    exit;
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