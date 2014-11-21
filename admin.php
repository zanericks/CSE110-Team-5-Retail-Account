<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
      Admin|RT Bank
    </title>
  </head>
  <body>

<?php
require('helper.php');
session_start();

$db = "accounts";
$logdb = "loginAccounts";
$conn = connRTServer( $db);
$logconn = connRTServer( $logdb);

$cred = "SELECT * FROM admin WHERE accountName = '" . $_SESSION['username'] . "' and password = '" . $_SESSION['password'] . "';";
$checkcred = $logconn->query($cred);

//Check if user loged in
if($checkcred->num_rows != 1)
{
	header('Location:index.html');
	$conn->close();
	exit();
}

echo "<p style=\"text-align:right;\">";
echo "<input type=\"button\" onclick=\"location.href='logout.php'\" value=\"Logout\" style=\"color:White; background-color:#A80000; border:2px solid #A80000;\"/></p>";

$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

for($x = 0; $x < $result->num_rows; $x++)
{
	if($x == 0)
	{
		echo "<table align=\"center\" style='width:50%'><col width=\"350px\"/><col width=\"400px\"/><col width=\"200px\"/><col width=\"200px\"/><tr><th>User</th><th>Account Name</th><th>Account Number</th><th>Balance</th></tr>";
	}

	$row = $result->fetch_row();
	echo "<tr><td> " . $row[2] . " </td><td> " . $row[1] . " </td><td> " . $row[0] . "</td><td>$" . $row[4] . "</td>";
	echo "<td><form action=\"debitSetup.php\" method=\"get\"><input type=\"hidden\" name=\"accId\" value=\"" . $row[0] . "\"><input type=\"submit\" value=\"Debit\"></form></td>";
	echo "<td><form action=\"creditSetup.php\" method=\"get\"><input type=\"hidden\" name=\"accNum\" value=\"" . $row[0] . "\"><input type=\"submit\" value=\"Credit\"></form></td>";
	echo "<td><form action=\"closeSetup.php\" method=\"get\"><input type=\"hidden\" name=\"closeAcc\" value=\"" . $row[0] . "\"><input type=\"submit\" value=\"Close\"></form></td>";
// to go to debit page, link is debit.html
// to go to credit page, link is credit.html
}

echo "</table>";

$conn->close();

function debitAcc()
{
	header('Location:debit.html');
}
?>
	<div id="blockedUsers"><input type="button" onclick="location.href='blockedUsers.php'" value="Blocked Users"/></div>
  </body>
</html>
