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
     Confirm Transaction:
    </h3>

<?php
session_start();

echo "<p style=\"text-align:center\">Are you sure you want to close the account " . $_SESSION['closeName'];
echo " and transfer its contents of $" . $_SESSION['closeBal'] . " to the account " . $_SESSION['transName'] . "?<br>";
echo "<input type=\"button\" onclick=\"location.href='transAndClose.php'\" value=\"Confirm\">";

//Check where cancel page should go
if($_SESSION['isadmin'] == 1)
{
	echo "<input type=\"button\" onclick=\"location.href='admin.php'\" value=\"Cancel\"></p>";
}
else
{
	echo"<input type=\"button\" onclick=\"location.href='success.php'\" value=\"Cancel\"></p>";
}
?>

  </body>
</html>
