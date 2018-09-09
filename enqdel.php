 <!DOCTYPE html>
<html>
<body>

<?php
    $id= filter_input(INPUT_POST, 'eid');
	 include 'config.php';
     $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
     $sql="delete from enq_tbl where eid=".$id;
     if ($conn->query($sql)){
        header("Location: enq.php"); 
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
