 <!DOCTYPE html>
<html>
<body>

<?php
    $id= filter_input(INPUT_POST, 'eid');
	 include 'config.php';
     $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
     $sql="delete from cust where id=".$id;
     if ($conn->query($sql)){
        header("Location: customers.php"); 
        exit;
      }
      else{
        echo "Error: ". $sql ."
    ". $conn->error;
      }
      $conn->close();
    
   
	   
    
?>
</body>
</html>
