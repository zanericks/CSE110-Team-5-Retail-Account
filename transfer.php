<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
    <title>
      Transfer|RT Bank
    </title>
  </head>
  <body>
    <h3>
      Transfer money:
    </h3>

    <form action="transferMoney.php" method="get" target="_self">
    <div id="transfer"><p>Please select the account to transfer money from:<br>

<?php
session_start();

//Connect to database
$ip = "104.131.156.252";
$username = "root";
$password = "rtbank";
$db = "accounts";
$port = "3306";
$conn = new mysqli( $ip, $username, $password, $db, $port);

$sql = "SELECT accNum, accName FROM accounts WHERE username = '" . $_SESSION['username'] . "';";
$result = $conn->query($sql);
$result2 = $conn->query($sql);
echo "<select name=\"from\">";
echo "<option value='' disabled>Select an Account:</option>";

//Loop through all possible accounts
for($i = 0; $i < $result->num_rows; $i++)
{
	$fetch = $result->fetch_row();
	echo "<option value=\"" . $fetch[0] . "\">" . $fetch[1] . "</option>";
}

echo "</select></p>";
echo "<p style=\"text-align:center;\"/><br>What type of transfer would you like to do?<br>";
echo "<input type=\"radio\" name=\"type\" value=\"self\" onclick=\"document.getElementById('myto').disabled = false; document.getElementById('exto').disabled = true;
      document.getElementById('exto').value='';\" checked>My Accounts";
echo "<input type=\"radio\" name=\"type\" value=\"exter\" onclick=\"document.getElementById('exto').disabled = false; document.getElementById('myto').disabled = true;\">External Account";
echo "<br>Select account to transfer money to: <select name=\"myto\" id=\"myto\">";

//Loop through all accounts
for($i = 0; $i < $result2->num_rows; $i++)
{
	$fetch = $result2->fetch_row();
	echo "<option value=\"" . $fetch[0] . "\">" . $fetch[1] . "</option>";
}
echo "</select><br> Or enter the email address accossiated with the account you would like to send money to: ";
echo "<br>(Note: This will only work if the user has set a default account)";
echo "<br><input type=\"email\" name=\"exto\" placeholder=\"bsmith@example.com\"i id=\"exto\" disabled>";
?>

<br>
    <p>Please enter the amount of money to transfer:<br>
    $<input type="number" name="amount" min=".01" step=".01" placeholder="ex: 50" required><br>
    Note: Just type number (ex: 50). You do not need a $ sign.</p></div><br><div id="submit">
    <input type="submit" value="Transfer" style="background-color:Green; color:White; border:2px solid Green"/>  
    <input type="button" onclick="location.href='success.php'" value="Cancel" style="background-color:#FFBF00; color:White; border:2px solid #FFBF00"/></div>
    </form>
  </body>
</html>
