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
  $sql = "INSERT INTO cust (customer_name, customer_phone, loan_type, loan_number, loan_amount, loan_tenure, emi_amount, emi_date, customer_location, customer_email, customer_dob)
  values ('$custname','$custphone','$loantype','$loannum','$loanamt','$loanten','$emiamt','$emidate','$custloc', '$custmail', '$custdob')";
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
}
else{
  echo "Password should not be empty";
  die();
}
 }
 else{
  echo "Username should not be empty";
  die();
 }
 ?>
 </body>
 </html>