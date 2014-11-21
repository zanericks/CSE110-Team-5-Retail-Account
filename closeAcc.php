<?php
require('helper.php');
session_start();

$accdb = "accounts";
$logdb = "loginAccounts";
$accon = connRTServer( $accdb);
$logconn = connRTServer( $logdb);

$sql = "SELECT defaultAccount FROM regUsers WHERE accountName = '" . $_SESSION['closeUser'] . "';";
$default = $logconn->query($sql);
$defid = $default->fetch_row();

//Check if default account
if($_SESSION['closeNum'] == $defid[0])
{
	$clear = "UPDATE regUsers SET defaultAccount = 0 WHERE accountName = '" . $_SESSION['closeUser'] . "';";
	$logconn->query($clear);
}

$delete = "DELETE FROM accounts WHERE accNum = '" . $_SESSION['closeNum'] . "';";
$accon->query($delete);

//Check where cancel page should go
if($_SESSION['isadmin'] == 1)
{
	header('Location:admin.php');
}
else
{
	header('Location:success.php');
}

$accon->close();
$logconn->close();
?>
