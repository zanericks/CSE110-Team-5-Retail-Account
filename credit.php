<?php
require('account.php');
session_start();

$amountCred = $_REQUEST['amount'];
$accNum = $_SESSION['creditNum'];
credit($amountCred, $accNum);
header('Location:admin.php');
?>
