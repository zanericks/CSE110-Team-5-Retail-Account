<?php
/*This file calculates interest at the begining of each month. To change when
 *interest is calculated, change the cron jobs schedual.
 */
require('rules.php');

//Connect to database
$db = "accounts";
$conn = connRTServer( $db);

//Acquire information
$sql = "SELECT accNum FROM accounts;";
$result = $conn->query($sql);

//Calculate interest for every account
for($i = 0; $i < $result->num_rows; $i++)
{
	$account = $result->fetch_row();
	interest( $account[0]);
}

//Clears avg account balance
$clear = "UPDATE accounts SET avgTotal = 0, lastInt = 0;";
$conn->query($clear);

//Reset days passed since interest calculated value
$reset = "ALTER TABLE accounts ALTER lastInt SET DEFAULT 0;";
$conn->query($reset);

$conn->close();
?>
