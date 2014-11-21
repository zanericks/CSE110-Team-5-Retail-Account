<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
      Mail|RT Bank
    </title>
  </head>
  <body>
    <h3>
      The contents of your account will be mailed here:
    </h3>

<?php
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

$sql = "SELECT firstname, lastname, address1, address2, city, state, zipcode FROM regUsers WHERE accountName = '" . $_SESSION['closeUser'] . "';";
$result = $conn->query($sql);
$mailto = $result->fetch_row();

echo "<p style=\"text-align:center\">" . $mailto[0] . " " . $mailto[1] . "<br>" . $mailto[2];

//Check if address line 2
if($mailto[3] != '')
{
	echo "<br>" . $mailto[3];
}

echo "<br>" . $mailto[4] . ", " . $mailto[5] . " " . $mailto[6];
echo "<br> Please confirm this account closure: <br>";
echo "<input type=\"button\" onclick=\"location.href='closeAcc.php'\" value=\"Confirm\">";

//Check where cancel page should go
if($_SESSION['isadmin'] == 1)
{
	echo "<input type=\"button\" onclick=\"location.href='admin.php'\" value=\"Cancel\"></p>";
}
else
{
	echo"<input type=\"button\" onclick=\"location.href='success.php'\" value=\"Cancel\"></p>";
}

$conn->close();
?>
    </p>
  </body>
</html>
