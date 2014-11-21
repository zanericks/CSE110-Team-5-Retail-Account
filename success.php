<?php
require('rules.php');
require('helper.php');
session_start();

$db = "accounts";
$conn = connRTServer( $db);

$sql = "select accName, balance, accNum from accounts where accounts.username = '" . $_SESSION["username"] . "';";
$res = $conn->query($sql);

echo "<p style=\"text-align:right;\">" . $_SESSION['username'] . "  <input type=\"button\" onclick=\"location.href='userSettings.php'\" 
      value=\"Edit Profile\" style=\"color:White; background-color:Blue; border:2px solid Blue;\"/><input type=\"button\" 
      onclick=\"location.href='logout.php'\" value=\"Logout\" style=\"color:White; background-color:#A80000; border:2px solid #A80000;\"/></p>";
echo "<p style=\"text-align:center;\">Welcome to RT Bank, " . $_SESSION['firstname'] . "!";
//Loop through and display all accounts
for($j = 0; $j < $res->num_rows; $j++)
{
	if($j == 0)
	{
		echo "<table align=\"center\" sytle='width:40%'><col width=\"400px\"/><col width=\"100px\"/><col width=\"200px\"/><tr><th>Account Name</th><th>Account Number</th><th>Balance</th></tr>";
	}

	$result = $res->fetch_row();

	if(minBalance($result[1]))
	{
		echo"<tr><td><font color=\"#FF0000\">Balance is Below Bank Minimum! Deposit more money immediately!</font><td></tr>";
	}

	echo "<tr><td>" . $result[0] . "</td><td align=\"center\">" . $result[2] . "</td><td align=\"right\">$" . $result[1] . "</td></tr>";
	echo "<td><form action=\"closeSetup.php\" method=\"get\"><input type=\"hidden\" name=\"closeAcc\" value=\"" . $result[2] . "\"><input type=\"submit\" value=\"Close\"></form></td>";
}

echo "</table></p>";
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
      Login|RT Bank
    </title>
  </head>

  <body>
    <p style="text-align:center;">
    <input type="button" onclick="location.href='makeAccount.html'" value="Create New Account" style="background-color:Green; color:White; border:2px solid Green;"/>
    <input type="button" onclick="location.href='transfer.php'" value="Transfer Money" style="background-color:#0080FF; color:White; border:2px solid #0080FF;"/></p>
  </body>
</html>
