<?php
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

$newphone = $_REQUEST['phone'];
$newemail = $_REQUEST['email'];
$newadd1 = $_REQUEST['address1'];
$newadd2 = $_REQUEST['address2'];
$newcity = $_REQUEST['city'];
$newstate = $_REQUEST['state'];
$newzip = $_REQUEST['zipcode'];
$newdefault = $_REQUEST['defaultAcc'];

//Check if email already taken
$sql = "SELECT * FROM regUsers WHERE email = '" . $newemail . "' and accountName != '" . $_SESSION['username'] . "';";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	header('Location:takenUpdEmail.php');
	$conn->close();
	exit();
}

$update = "UPDATE regUsers SET phone = '" . $newphone . "', email = '" . $newemail . "', address1 = '" .
	   $newadd1 . "', address2 = '" . $newadd2 . "', city = '" . $newcity . "', state = '" . $newstate
	   . "', zipcode = '" . $newzip . "', defaultAccount = '" . $newdefault . "' WHERE accountName = '" .
	   $_SESSION['username'] . "';";

$conn->query($update);
header('Location:success.php');
$conn->close();
?>
