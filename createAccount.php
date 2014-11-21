<?php
require('helper.php');
session_start();

$db = "accounts";
$conn = connRTServer( $db);

if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

if(empty($_REQUEST['accountName']))
{
	header("Location:emptyAccount.html");
	$conn->close();
	exit();
}
else
{
	$accName = $_REQUEST['accountName'];
}

$accType = $_REQUEST['accountType'];

$sql = "insert into accounts (accNum, accName, username, accType, balance) values (NULL, '" . $accName . "', '" . $_SESSION["username"] . "', '" . $accType . "', '0');";
$conn->query($sql);

header("Location:success.php");
$conn->close();
?>
