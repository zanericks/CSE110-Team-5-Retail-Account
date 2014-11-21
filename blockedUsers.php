<?php
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

//Check Connection 
if($conn->connect_error)
{
	echo "Connection failed: " . $conn->connect_error);
}

//Retrieve blocked user accounts
$sql = "Select accountName from * where 'accountBlock' = 1;";

//$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

for($x = 0; $x < $result->num_rows; $x++)
{
        if($x == 0)
        {
                echo "  <table style='width:50%'><tr><th>User</th><th>Account Name</th><th>Account Number</th><th>Balance</th></tr>";
        }

        $row = $result->fetch_row();
        //echo "<tr><td> " . $row[2] . " </td><td> " . $row[1] . " </td><td> " . $row[0] . "</td><td>$" . $row[4] . "</td>";
        echo "<tr><td> " . $row[0] . " </td><td> " . $row[0] . " </td><td> " . $row[0] . "</td><td>$" . $row[0] . "</td>";
        echo "<td><form action=\"debitSetup.php\" method=\"get\"><input type=\"hidden\" name=\"accId\" value=\"" . $row[0] . "\"><input type=\"submit\" value=\"Debit\"></form></td>";
        echo "<td><form action=\"creditSetup.php\" method=\"get\"><input type=\"hidden\" name=\"accNum\" value=\"" . $row[0] . "\"><input type=\"submit\" value=\"Credit\"></form></td>";
// to go to debit page, link is debit.html
// to go to credit page, link is credit.html
}

echo "</table>";

$conn->close();
?>
