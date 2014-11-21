<?php
//Logs into server, and returns connection to it
function connRTServer( $database)
{
	$ip = "104.131.156.252";
	$username = "root";
	$password = "rtbank";
	$port = "3306";
	$conn = new mysqli( $ip, $username, $password, $database, $port);

	//Check if connected
	if($conn->connect_error)
	{	
		die("Connection Failed: " . $conn->connect_error);
	}
	return $conn;
}

//Checks if email is already in system. Returns true if email availible, false if not.
function newEmail ($checkThis)
{
	$db = "loginAccounts";
	$conn = connRTServer( $db);

	$sql = "SELECT * FROM regUsers WHERE email = '" . $checkThis . "';";
	$result = $conn->query($sql);

	//Check number of emails
	if($result->num_rows > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}
?>
