<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
      Close Account|RT Bank
    </title>
  </head>
  <body>
    <h3>
    Select which account you would like to transfer the contents of your account to:
    </h3>
    <form action="closeTrans.php" target="_self" method="get">
    <p style="text-align:center"><select name="moneyto">
    <option value='' disabled>Choose an account:</option>

<?php
require('helper.php');
session_start();

$db = "accounts";
$conn = connRTServer( $db);

$sql = "SELECT accNum, accName FROM accounts WHERE username = '" . $_SESSION['closeUser'] . "';";
$result = $conn->query($sql);

//Loop through and display results
for( $i = 0; $i < $result->num_rows; $i++)
{
	$account = $result->fetch_row();

	//Check to see if account currently being closed
	if($account[0] != $_SESSION['closeNum'])
	{
		echo "<option value=\"" . $account[0] . "\">" . $account[1] . "</option>";
	}
}

echo "</select>";
echo "<br> <input type=\"submit\" value=\"Submit\">";

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
    </form>
  </body>
</html>
