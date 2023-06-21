<!DOCTYPE html>
<html>
<head>
<title>CUSTOMER's DETAILS</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>ID</th>
<th>NAME</th>
<th>PASSWORD</th>
<th>PHONENO</th>
<th>DOB</th>
<th>ADDRESS</th>
<th>PINCODE</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root","", "SHOPPING");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT ID,NAME, PASSWORD,PHONENO,DOB,ADDRESS,PINCODE FROM CUSTOMER";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["NAME"] . "</td><td>". $row["PASSWORD"]. "</td><td>". $row["PHONENO"]. "</td><td>". $row["DOB"]. "</td><td>". $row["ADDRESS"]. "</td><td>". $row["PINCODE"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>