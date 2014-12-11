<?php
/*This is a script that runs every night and adds the current balance of an
 *account to a total that will be used to calculate the average.
 */
require('helper.php');

//Connect to database
$db = "accounts";
$conn = connRTServer( $db);

//Get all accounts
$sql = "SELECT accNum, balance, lastInt FROM accounts;";
$result = $conn->query($sql);

//Loop through all accounts
for($i = 0; $i < $result->num_rows; $i++)
{
	$account = $result->fetch_row();
	$total = "UPDATE accounts SET avgTotal = (avgTotal + " . $account[1] . "), avgPen = (avgPen + " . $account[1] . "),
	lastInt = (lastInt + 1)  WHERE accNum = '" . $account[0] . "';";
	$conn->query($total);
}

//Update number of days since last interest payment
$update = "ALTER TABLE accounts ALTER lastInt SET DEFAULT " . ($account[2] + 1);
$conn->query($update);

$conn->close();
?>
