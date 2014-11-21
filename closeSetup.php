<?php
require('helper.php');
session_start();

$db = "accounts";
$logdb = "loginAccounts";
$conn = connRTServer( $db);
$logconn = connRTServer( $logdb);

$accNum = $_REQUEST['closeAcc'];
$_SESSION['closeNum'] = $accNum;

$sql = "SELECT balance, accName, username FROM accounts WHERE accNum = '" . $accNum . "';";
$result = $conn->query($sql);
$balance = $result->fetch_row();

$adsql = "SELECT * FROM admin WHERE accountName = '" . $_SESSION['username'] . "';";
$result2 = $logconn->query($adsql);

//Check if account orginates as user or admin
if($result2->num_rows > 0)
{
	$_SESSION['isadmin'] = 1;
}
else
{
	$_SESSION['isadmin'] = 0;
}

//Check if any money in account
if($balance[0] == 0.00)
{
	header('Location:confirmClose.php');
	$conn->close();
	$logconn->close();
	exit();
}

$_SESSION['closeBal'] = $balance[0];
$_SESSION['closeName'] = $balance[1];
$_SESSION['closeUser'] = $balance[2];
header('Location:close.php');
$conn->close();
$logconn->close();
?>
