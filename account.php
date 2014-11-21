<?php
require('rules.php');
require('helper.php');

//Debits an account, returns true if successful, else false
function debit( $debitAmount, $accountNum)
{
	$accdb = "accounts";
	$acconn = connRTServer( $accdb);
	$sql = "select balance from accounts where accNum = " . $accountNum . ";";
	$result = $acconn->query($sql);
	$currBal = $result->fetch_row();

	//Check if can be debited
	if(canDebit($currBal[0], $debitAmount))
	{
		$newBal = $currBal[0] - $debitAmount;
		$sql2 = "update accounts set balance = " . $newBal . " where accNum = " . $accountNum . ";";
		$acconn->query($sql2);
		return TRUE;
	}
	else
	{
		return FALSE;
	}

	$acconn->close();
}

//Credits an account
function credit( $creditAmount, $accountNum)
{
	$accdb = "accounts";
	$conn = connRTServer( $accdb);
	$sql = "select balance from accounts where accNum = " . $accountNum . ";";
	$result = $conn->query($sql);
	$currBal = $result->fetch_row();

	$newBal = $creditAmount + $currBal[0];

	$sql2 = "update accounts set balance = " . $newBal . " where accNum = " . $accountNum . ";";
	$conn->query($sql2);

	$conn->close();
}

//Transfers money from one account to another, returns true on success
function transfer( $toAccount, $fromAccount, $amount)
{
	if(!debit( $amount, $fromAccount))
	{
		return false;
	}
	
	credit( $amount, $toAccount);
	return true;
}	
?>
