<?php
/*This script is run monthly to determine if an account is under the minimum
 *account balance requirements, and if so, apply the penalty.
 */
require('rules.php');

//Connect to database
$db = "accounts";
$conn = connRTServer( $db);

//Retrieve accounts
$sql = "SELECT accNum From accounts;";
$result = $conn->query($sql);

//Loop through all accounts
for($i = 0; $i < $result->num_rows; $i++)
{
	$account = $result->fetch_row();
	penalty( $account[0]);
}

//Reset penalty average calulator to zero
$reset = "UPDATE accounts SET avgPen = 0;";
$conn->query($reset);

$conn->close();
?>
