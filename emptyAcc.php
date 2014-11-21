<?php
$type = $_REQUEST['emptyhow'];

//Check which option was selected
if($type == "mail")
{
	header('Location:emptyMail.php');
}
else
{
	header('Location:emptyTrans.php');
}
?>
