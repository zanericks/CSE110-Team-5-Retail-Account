<?php

//Checks to see if the user can debit their account
function canDebit( $currBalance, $debitAmount)
{
	if($currBalance >= $debitAmount && $debitAmount != 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Checks if account balance is below bank minimums
function minBalance( $input)
{
	if($input < 25)
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>
