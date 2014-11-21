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
      Are you sure you want to close this account?
    </h3>
    <p style="text-align:center"><input type="button" value="Confirm" onclick="location.href='closeAcc.php'">

<?php
session_start();

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
