<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://104.131.156.252/geisel.ico" type="image/x-icon" />
    <title>
      Account Details|RT Bank
    </title>
  </head>
  <body>

<?php
/* This file grabs all the accounts that a certain user has in the database and prints it to the 
 * page. It also shows the balance and the account numbers for each account. This page also allows
 * users to edit their profile, through the button at the top right. They can also log out.
 */ 
require('helper.php');
session_start();

$db = "accounts";
$logdb = "loginAccounts";
$conn = connRTServer( $db);
$logconn = connRTServer( $logdb);

$accNum = $_REQUEST['descAcc'];

$sql = "SELECT * FROM accounts WHERE accNum = '" . $accNum . "';";
$sql2 = "SELECT defaultAccount FROM regUsers WHERE accountName = '" . $_SESSION['username'] . "';";
$result = $conn->query($sql);
$defres = $logconn->query($sql2);
$currAcc = $result->fetch_row();
$isdef = $defres->fetch_row();

echo "<div id=\"userbuttons\">" . $_SESSION['username'] . " <input type=\"button\" onclick=\"location.href='success.php'\" 
      value=\"My Accounts\" style=\"color:White; background-color:Blue; border:2px solid Blue;\"/><input type=\"button\" onclick=\"location.href='logout.php'\" 
      value=\"Logout\" style=\"color:White; background-color:#A80000; border:2px solid #A80000;\"/><form action=\"closeSetup.php\"method=\"get\"><input type=\"hidden\" name=\"closeAcc\" value=\""
      . $accNum . "\"><input type=\"submit\" value=\"Close Account\" style=\"color:White; background-color:#FFBF00; 
      border:2px solid #FFBF00;\"></form></div>";
echo "<div id=\"submit\"><h4>Account: " . $currAcc[1] . "</h4> Account Type: " . $currAcc[3] . " Account Number: " . $currAcc[0] . "<br> Current Balance: $ " . $currAcc[4];

//Check if default account
if($isdef[0] == $accNum)
{
	echo " Default Account";
}

echo "</div>";

//Retrieve transaction history
$hist = "SELECT * FROM history" . $accNum . ";";
$result2 = $conn->query($hist);

//Display and format table
for($i = 0; $i < $result2->num_rows; $i++)
{
	//Check if table formating needed
	if($i == 0)
	{
		echo "<table align=\"center\"><col width=\"100px\"><col width=\"100px\"><col width=\"300px\"><col width=\"100px\">
		      <col width=\"100px\"><col width=\"100px\"><tr><th>Date</th><th>Type</th><th>Description</th><th>Credit</th>
		      <th>Debit</th><th>Balance</th></tr>";
	}
	
	$currhist = $result2->fetch_row();

	echo "<tr><td align=\"center\">" . $currhist[0] . "</td><td>" . $currhist[1] . "</td><td>" . $currhist[2] . "</td><td align=\"right\">$"
	      . $currhist[3] . "</td><td align=\"right\">$" . $currhist[4] . "</td><td align=\"right\">$" . $currhist[5] . "</td></tr>";
}

echo "</table>";
$conn->close();
?>

  </body>
</html>
