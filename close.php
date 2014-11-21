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
     There is still money in your account!
   </h3>
   <form action="emptyAcc.php" method="get" target="_self">

<?php
session_start();

echo "<p style=\"text-align:center\">The account " . $_SESSION['closeName'] . " still has $" . $_SESSION['closeBal'] . " left in it!</p>";
echo "<p style=\"text-align:center\">Would you like us to <input type=\"radio\" name=\"emptyhow\" value=\"transfer\" checked>transfer the money to";
echo " another one of your accounts?<br> Or <input type=\"radio\" name=\"emptyhow\" value=\"mail\">mail you a";
echo "check with the contents of your account?<br>";
echo "<input type=\"submit\" value=\"Close Account\">";

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
    </form>
  </body>
</html>
