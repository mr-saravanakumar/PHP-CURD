<?php                                                                                                                                                                                                                                                                                                                              

$ID = $_POST['ID'];
$PHONENO  = $_POST['PHONENO'];

if (!empty($ID))
{
    $host='localhost';
    $dbusername='root';
    $dbpassword='';
    $dbname='SHOPPING';

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
  if ($conn->connect_error) 
  {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql="UPDATE CUSTOMER SET PHONENO='$PHONENO'WHERE ID='$ID'";
  if ($conn->query($sql) === TRUE) {
    echo "Record UPDATED successfully";
   } 
  else 
   {
    echo "Error update record: ".$conn->error;
   }
  $conn->close();
  }
  ?>
