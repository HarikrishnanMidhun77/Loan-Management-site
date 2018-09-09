<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: admin.php"); 
    exit; 
} 

$cid=$_POST['row_id'];
include 'config.php';
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

$sql = 'SELECT * FROM cust where id= '.$cid;
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);



?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Admin Dashboard | EZY-Loan</title>
	<link rel='stylesheet' href='css/style.min.css' />
	<style type="text/css">
		input[type=submit] {
  background-color:#6c62fc;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  color: #fff;
  font-size:16px;
  font-weight: bold;
  line-height: 1.4;
  padding: 10px;
  width: 180px
}
	</style>
</head>
<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="#" class="navbar__logo">EZY LOAN</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="dashboard.php">Add Customer</a></li>
						
						<li><a href="customers.php">View Customers</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Page content -->
	<div class="app">
		<div class="container">
			<div class="app__inner">
				<div class="app__menu">
					<ul class="vMenu">
						<li><a href="dashboard.php">Add New Customer</a></li>
						<li><a href="customers.php">View Customers</a></li>
					
					</ul>
				</div>
				<div class="app__main">
					<div class="text-container">
						<h1 class="app__main__title" id="form_submit">Update Customer Details</h1>
							<h4><div id=form_submit></div></h4>
							<h1>&nbsp;</h1>
								<form method="post" action="updater.php?row_id=<?php echo $row["id"]; ?>">
									<div class="double">
							    		<div class="half">
							       			<label for="bank_name">Bank Name</label>
							       			<input type="text" name="bank_name" value="<?php echo $row["bank_name"]; ?>" placeholder="Enter Your Bank Name">
							    		</div>
							    		<div class="half">
							      			<label for="loan_type">Loan Type</label>
									    	<select name="loan_type">
									    		<option value="1" <?php if ($row["loan_type"]=="New Car Loan"){echo "selected";}?>>New Car Loan</option>
									   			<option value="2" <?php if ($row["loan_type"]=="Used Car Loan"){echo "selected";}?>>Used Car Loan</option>
									   			<option value="3" <?php if ($row["loan_type"]=="Two-wheeler Loan"){echo "selected";}?>>Two-wheeler Loan</option>
									   			<option value="4" <?php if ($row["loan_type"]=="Commercial Vehicle Loan"){echo "selected";}?>>Commercial Vehicle Loan</option>
									   			<option value="5" <?php if ($row["loan_type"]=="Home Loan"){echo "selected";}?>>Home Loan</option>
									   			<option value="6" <?php if ($row["loan_type"]=="Personal Loan"){echo "selected";}?>>Personal Loan</option>
								   				<option value="7" <?php if ($row["loan_type"]=="Property Loan"){echo "selected";}?>>Property Loan</option>
								   			</select>
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="loan_number">Loan Number</label>
							       			<input type="number" value="<?php echo $row["loan_number"]; ?>" name="loan_number" placeholder="Enter your 10 digit loan number">
							    		</div>
							    		<div class="half">
							      			<label for="loan_amount">Loan Amount</label>
							      			<input type="number" value="<?php echo $row["loan_amount"]; ?>" name="loan_amount" placeholder="Enter the loan amount">
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="loan_tenure">Tenure</label>
							       			<input type="number" value="<?php echo $row["loan_tenure"]; ?>" name="loan_tenure" placeholder="How long is the loan tenure in years?">
							    		</div>
							    		<div class="half">
							      			<label for="emi_amount">EMI Amount</label>
							      			<input type="number" value="<?php echo $row["emi_amount"]; ?>" name="emi_amount" placeholder="Enter the EMI amount">
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="emi_date">EMI Date</label>
							       			<input type="date" value="<?php echo $row["emi_date"]; ?>" name="emi_date" placeholder="Date of EMI payment">
							    		</div>
							    		<div class="half">
							      			<label for="customer_name">Customer Name</label>
							      			<input type="text" value="<?php echo $row["customer_name"]; ?>" name="customer_name" placeholder="Enter the name of the Customer ">
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="customer_location">Location</label>
							       			<input type="text" value="<?php echo $row["customer_location"]; ?>" name="customer_location" placeholder="Enter the location of the customer">
							    		</div>
							    		<div class="half">
							      			<label for="customer_phone">Number</label>
							      			<input type="number" value="<?php echo $row["customer_phone"]; ?>" name="customer_phone" placeholder="Enter the phone number">
							    		</div>
							  		</div>
							  		<div class="double">
							    		<div class="half">
							    			<label for='customer_email'>E-Mail</label>
											<input type="email" value="<?php echo $row["customer_email"]; ?>" name="customer_email" placeholder="Enter the customer's mail id">
							    		</div>
							    		<div class="half">
							    			<label for="customer_dob">Date of Birth</label>
							    			<input type="date" value="<?php echo $row["customer_dob"]; ?>" name="customer_dob" placeholder="Enter the customer's date of birth">
							    		</div>
							    	</div>
							    	<div id="form_submit">
										<input type="submit" value="Update">
									</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src='js/app.min.js'></script>
</body>
</html>