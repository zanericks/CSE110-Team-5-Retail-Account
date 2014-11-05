<?php 

//Username and password for mySQL server
$servername = "104.131.156.252";
$username = "root";
$password = "rtbank";
$db = "loginAccounts";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $db, $port);

echo "HEY THERE";

// Check connection
if ($conn->connect_error)
{
        die("Connection failed: " . $conn->connect_error);
}

$sqlquery = "Select balance from " . $userid . ";";

echo "query is:  " . $sqlquery;
echo "user id is: " . $userid;

?>
