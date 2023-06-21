<?php

$ID = $_POST['ID'];

if (!empty($ID))
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "SHOPPING";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM CUSTOMER WHERE id=$ID";
if ($conn->query($sql) === $ID) 
{
  echo "Record deleted successfully";
 } 
else 
 {
  echo "Error deleting record: ".$conn->error;
 }
$conn->close();
}
?>