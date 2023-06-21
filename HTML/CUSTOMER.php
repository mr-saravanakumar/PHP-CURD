<?php                                                                                                                                                                                                                                                                                                                              

$ID = $_POST['ID'];
$NAME  = $_POST['NAME'];
$PASSWORD = $_POST['PASSWORD'];
$PHONENO = $_POST['PHONENO'];
$DATE = $_POST['DATE'];
$ADDRESS = $_POST['ADDRESS'];
$PINCODE =$_POST['PINCODE'];




if (!empty($ID) || !empty($NAME) || !empty($PASSWORD)|| !empty($PHONENO)|| !empty($DATE)|| !empty(ADDRESS)|| !empty(PINCODE))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shopping";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT ID From CUSTOMER Where ID = ? Limit 1";
  $INSERT = "INSERT INTO CUSTOMER(ID , NAME ,PASSWORD, PHONENO,DOB,ADDRESS,PINCODE )values(?,?,?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $ID);
     $stmt->execute();
     $stmt->bind_result($ID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ississi", $ID,$NAME,$PASSWORD,$PHONENO,$DATE,$ADDRESS,$PINCODE);
      $stmt->execute();
      echo "NEW RECORD INSERTED SUCCESSFULLY";
     } else {
      echo "SORRY SOMEONE ALREADY HAVE AN DETAILS WITH THIS ID";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>