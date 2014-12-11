<?php
/*This script resets all daily limits. Currently configured to run every day
 *at 12 AM. To change, edit the cron tab file.
 */
require('helper.php');

$db = "accounts";
$conn = connRTServer( $db);

//updates credit and debit limits to zero
$sql = "UPDATE accounts SET credLim = 0, debLim = 0;";
$conn->query($sql);
$conn->close();
?>
