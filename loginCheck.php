<?php
//Username and password for mySQL server
$servername = "104.131.156.252";
$username = "root";
$password = "rtbank";
$db = "loginAccounts";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $db, $port);


// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

//Users inputed infor
$userid = $_REQUEST['username'];
$userpass = $_REQUEST['password'];

$sql = "SELECT password FROM " . $userid . " ;";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	$comp =  $result->fetch_row();
	if($comp[0] == $userpass)
	{
		header("Location:success.html");
	}
	else
	{
		header("Location:invalIndex.html");
	}
}
else
{
	header("Location:invalIndex.html");
}


$conn->close();
?>

