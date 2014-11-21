<?php
require('helper.php');
session_start();

$db = "accounts";
$conn = connRTServer( $db);

$toacc = $_REQUEST['moneyto'];
$_SESSION['closeto'] = $toacc;

//Get final account name
$sql = "SELECT accName FROM accounts WHERE accNum = '" . $toacc . "';";
$result = $conn->query($sql);
$newname = $result->fetch_row();

$_SESSION['transName'] = $newname[0];
header('Location:confirmCloseTrans.php');
$conn->close();
?>
