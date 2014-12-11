<?php
/* This file allows the admin to unblock a certain user after they clicked the "Unblock" button
 * where it contained the list of blocked users.
 */
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

$account = $_REQUEST['accName'];
$sql = "UPDATE regUsers SET accountBlock = '0' WHERE accountName = '" . $account . "';";
$conn->query($sql);

header('Location:blockedUsers.php');
$conn->close();
?>
