<?php
require('account.php');
session_start();

$amount = $_REQUEST['amount'];
$accNum = $_SESSION['debitNum'];
if(debit($amount, $accNum))
{
	header('Location: admin.php');
}
else
{
	header('Location: insufficientFunds.html');
}
?>
