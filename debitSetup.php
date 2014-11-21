<?php
session_start();

$accNum = $_REQUEST['accId'];
$_SESSION['debitNum'] = $accNum;
header('Location:debit.html');
?>
