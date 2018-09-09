<?php 
if(isset($_POST['submit'])){ 
    include 'config.php';

     
    $db = new mysqli ($host, $dbusername, $dbpassword, $dbname) or die("Error connecting to database."); 
    //Connect to the databasse 
    //mysqli_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
    //Selects the database 
     
    /* 
    The Above code can be in a different file, then you can place include'filename.php'; instead. 
    */ 
     
    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $usr = filter_input(INPUT_POST, 'username');
    $pas = filter_input(INPUT_POST, 'password'); 
    $sql = "SELECT * FROM login WHERE username='$usr' AND password='$pas' LIMIT 1"; 
    $sql = mysqli_query($db, $sql);
    if(mysqli_num_rows($sql) == 1){ 
        $row = mysqli_fetch_array($sql); 
        session_start(); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['fname'] = $row['first_name']; 
        $_SESSION['lname'] = $row['last_name']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: dashboard.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: index.html"); 
        exit; 
    } 
}else{    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: index.html");     
    exit; 
} 
?> 