<?php

session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: admin.php"); 
    exit; 
}  

include 'config.php';

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

    $sql = 'SELECT * FROM enq_tbl';
	$result = mysqli_query($conn, $sql);

if(!$result){
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>View Customers | EZY-Loan</title>
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
    

<script>
function myFunction() {
    var x;
    var site = prompt("Please enter the message", "message to customer");
    if (site != null) {
        //x = "Welocme at " + site + "! Have a good day";
        document.getElementById("msgid").value =site;
    }
    //alert(document.getElementById("msgid").value);
}
</script>


</head>
<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.html" class="navbar__logo">EZY LOAN</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="dashboard.php">Add Customer</a></li>
						<li><a href="#">View Customers</a></li>
						<li><a href="excel.php">Download Spreadsheet</a></li>
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
						<li><a href="customers.php" >View Customers</a></li>
						<li><a href="#" class="vMenu--active">View Enquiries</a></li>
						
					</ul>
				</div>
				<div class="app__main">
					<div class="text-container">
						<h3 class="app__main__title">Enquiries</h3>
						

						<table id="customers">
						<thead>
						  <tr>
						  	<th>no.</th>
						    <th>Name</th>
						    <th>Phone Number</th>
						    <th>Location</th>
						    <th>Email ID</th>
						    <th>Loan Type</th>
						    <th> </th>
						    <th> </th>
						    
						  </tr>
						 </thead>
					<tbody>
<?php


	$no=1;

    while($row = mysqli_fetch_array($result)) {

    					echo 
    					'<tr>
						    <td>'.$no.'</td>
						    <td>'.$row["ename"]."</td>
						    <td>".$row["ephno"]."</td>
						    <td>".$row["eloc"]."</td>
						    <td>".$row["eemail"]."</td>
						    <td>".$row["elt"]."</td>
                            <td>
                            <form method='POST' action='enqmsg.php'>
                            <input type='hidden'  name='name' value='".$row["ename"]."'>";
                            echo " <input type='hidden'  name='phone' value='".$row["ephno"]."'>";
                            echo " <input type='hidden'  name='location' value='".$row["eloc"]."'>";
                            echo " <input type='hidden'  name='type' value='".$row["elt"]."'>";
                            echo "<input type='hidden'  name='email' value='".$row["eemail"]."'>";
                            echo "<input type='hidden' id='msgid' name='msg' >";
                           echo "<button class='button__primary' type='submit' onclick='myFunction()'  align='center'>Message</button> 
                           </form>
                           </td>
                          
                            <td>
                            <form method='POST' action='enqdel.php'>
                            <input type='hidden'  name='eid' value='".$row["eid"]."'>";
                            echo '<button class="button__primary" type="submit" onclick="return confirm(';echo"'Are you sure?')";echo'"  align="center">Delete</button> ';
                          echo"  </form>
                            </td>
						 
						  </tr>";
						  $no++;
    }
    
    
    
    ?>
 			</table>	
					</div>
				</div>
			</div>
		</div>
	</div>

<script src='js/app.min.js'></script>
</body>
</html>