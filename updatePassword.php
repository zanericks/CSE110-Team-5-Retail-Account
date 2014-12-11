<?php
/* This file grabs the two passwords that the user entered when updating their password.
 * If the passwords do not match, then we redirect them to a page that shows an error message
 * that the passwords did not match. If they do match, then we update the password in the
 * database table.
 */
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db );

$password1 = $_REQUEST['password1'];
$password2 = $_REQUEST['password2'];

if( $password1 != $password2 )
{
  header("Location: mismatchPWReset.html");
}
else
{
  $sql2 = "UPDATE regUsers SET password = '" . $password1 . "' WHERE accountName = '" . $_SESSION['username'] . "';";
  $conn->query( $sql2 );
  header("Location: userSettings.php");
  $conn->close();
  exit();
}
?>
