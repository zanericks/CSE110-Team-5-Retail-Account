<?php
session_start();

$accId = $_REQUEST['accNum'];
$_SESSION['creditNum'] = $accId;
header('Location:credit.html');
?>
