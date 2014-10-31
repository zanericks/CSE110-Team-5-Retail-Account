<?php

$servername = "104.131.156.252";
$username = "root";
$password = "rtbank";

$conn = new mysqli($servername, $username, $password);

echo '<p>MySQLi successfully running</p>';

// Check connection
if ($conn->connection_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "<p>Connected successfully</p>";



$sql = "SELECT accountName, password FROM admin";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		echo "<br> accountName: " . $row["accountName"] . "- password: " . $row["password"];
	}
}
else
{
	echo $result->num_rows . "results";
}


$conn->close();
?>

