<?php
require('account.php');
session_start();

$accdb = "accounts";
$logdb = "loginAccounts";
$acconn = connRTServer( $accdb);
$logconn = connRTServer( $logdb);

transfer( $_SESSION['closeto'], $_SESSION['closeNum'], $_SESSION['closeBal']);

$sql = "SELECT defaultAccount FROM regUsers WHERE accountName = '" . $_SESSION['closeUser'] . "';";
$result = $logconn->query($sql);
$isdef = $result->fetch_row();

//Check if closed account was default
if($_SESSION['closeNum'] == $isdef[0])
{
	$clear = "UPDATE regUsers SET defaultAccount = 0 WHERE accountName = '" . $_SESSION['closeUser'] . "';";
	$logconn->query($clear);
}

$delete = "DELETE FROM accounts WHERE accNum = '" . $_SESSION['closeNum'] . "';";
$acconn->query($delete);

//Check where cancel page should go
if($_SESSION['isadmin'] == 1)
{
	header('Location:admin.php');
}
else
{
	header('Location:success.php');
}

$acconn->close();
$logconn->close();
?>
