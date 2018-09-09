<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: admin.php"); 
    exit; 
} 
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
						<li><a href="#">Add Customer</a></li>
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
						<li><a href="#" class="vMenu--active">Add New Customer</a></li>
						<li><a href="customers.php">View Customers</a></li>
						<li><a href="enq.php" >View Enquiries</a></li>
					
					</ul>
				</div>
				<div class="app__main">
					<div class="text-container">
						<h1 class="app__main__title" id="form_submit">Add new Customer</h1>
							<h1>&nbsp;</h1>
								<form method="post" action="newcustomer.php">
									<div class="double">
							    		<div class="half">
							       			<label for="bank_name">Bank Name</label>
							       			<input type="text" name="bank_name" placeholder="Enter Your Bank Name" required>
							    		</div>
							    		<div class="half">
							      			<label for="loan_type">Loan Type</label>
									    	<select name="loan_type">
									    		<option value="1">New Car Loan</option>
									   			<option value="2">Used Car Loan</option>
									   			<option value="3">Two-wheeler Loan</option>
									   			<option value="4">Commercial Vehicle Loan</option>
									   			<option value="5">Home Loan</option>
									   			<option value="6">Personal Loan</option>
								   				<option value="7">Property Loan</option>
								   			</select>
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="loan_number">Loan Number</label>
							       			<input type="number" name="loan_number" placeholder="Enter your 10 digit loan number" required>
							    		</div>
							    		<div class="half">
							      			<label for="loan_amount">Loan Amount</label>
							      			<input type="number" name="loan_amount" placeholder="Enter the loan amount" required>
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="loan_tenure">Tenure</label>
							       			<input type="number" name="loan_tenure" placeholder="How long is the loan tenure in years?" required>
							    		</div>
							    		<div class="half">
							      			<label for="emi_amount">EMI Amount</label>
							      			<input type="number" name="emi_amount" placeholder="Enter the EMI amount" required>
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="emi_date">EMI Date</label>
							       			<input type="date" name="emi_date" placeholder="Date of EMI payment" required>
							    		</div>
							    		<div class="half">
							      			<label for="customer_name">Customer Name</label>
							      			<input type="text" name="customer_name" placeholder="Enter the name of the Customer " required>
							    		</div>
							  		</div>
									<div class="double">
							    		<div class="half">
							       			<label for="customer_location">Location</label>
							       			<input type="text" name="customer_location" placeholder="Enter the location of the customer" required>
							    		</div>
							    		<div class="half">
							      			<label for="customer_phone">Number</label>
							      			<input type="number" name="customer_phone" placeholder="Enter the phone number" required>
							    		</div>
							  		</div>
							  		<div class="double">
							    		<div class="half">
							    			<label for='customer_email'>E-Mail</label>
											<input type="email" name="customer_email" placeholder="Enter the customer's mail id" required>
							    		</div>
							    		<div class="half">
							    			<label for="customer_dob">Date of Birth</label>
							    			<input type="date" name="customer_dob" placeholder="Enter the customer's date of birth" required>
							    		</div>
							    	</div>
							    	<div id="form_submit">
										<input type="submit" value="Submit">
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