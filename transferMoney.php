<?php
require('account.php');

session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

$accNum = $_REQUEST['from'];
$amount = $_REQUEST['amount'];
$type = $_REQUEST['type'];

//Check what type of transfer is occuring
if($type == "self")
{
	$recipient = $_REQUEST['myto'];
}
else
{
	$useremail = $_REQUEST['exto'];
	$sql = "SELECT defaultAccount FROM regUsers WHERE email = '" . $useremail . "';";
	$result = $conn->query($sql);

	//Check if user exists
	if($result->num_rows == 0)
	{
		header('Location:invalidEmailTrans.php');
		$conn->close();
		exit();
	}

	$comp = $result->fetch_row();
	//Check if user has default account set up
	if($comp[0] == 0)
	{
		header('Location:noDefaultTrans.php');
		$conn->close();
		exit();
	}
	else
	{
		$recipient = $comp[0];
	}
}

if(!transfer($recipient, $accNum, $amount))
{
	header("Location: insufficientTransferFunds.php");	
}

header('Location: success.php');
?>


<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
       Admin|RT Bank
    </title>
  </head>
  <body>
  </body>
</html>
