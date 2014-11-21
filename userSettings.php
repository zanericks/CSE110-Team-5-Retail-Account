<html>
  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="shortcut icon" href="http://www.iconj.com/ico/c/j/cjmjbapkib.ico" type="image/x-icon" />
   <title>
    Edit Profile|RT Bank
   </title>
  </head>
  <body>
   <p style="text-align:right;"/><input type="button" onclick="location.href='logout.php'" value="Logout" style="color:White; background-color:#A80000; border:2px solid #A80000";/></p>
   <h3><p style="text-align:center;"/>Edit your RT Bank profile and settings from here!</p></h3>
   <form action="updateUserInfo.php" method="get" target="_self">

<?php
require('helper.php');
session_start();

$db = "loginAccounts";
$accdb = "accounts";
$conn = connRTServer( $db);
$acc = connRTServer( $accdb);

//Retrieves current user info
$sql = "SELECT * FROM regUsers WHERE accountName = '" . $_SESSION['username'] . "';";
$result = $conn->query($sql);
$userinfo = $result->fetch_row();

echo "<p style=\"text-align:center;\"/>Update your contact info!</p>";
echo "<p style=\"text-align:center;\"/>Phone:<input type=\"number\" name=\"phone\" min=\"9\" value=\"" . $userinfo[4] . "\" required>";
echo "Email:<input type=\"email\" name=\"email\" value=\"" . $userinfo[5] . "\" required><br>";
echo "Street Address Line 1:<input type=\"text\" name=\"address1\" value=\"" . $userinfo[6] . "\" required><br>";
echo "Street Address Line 2:<input type=\"text\" name=\"address2\" placeholder=\"(Optional)\"><br>";
echo "City:<input type=\"text\" name=\"city\" value=\"" . $userinfo[8] . "\" required><br>";
echo "State:<select name='state'>
	<option value=" . $userinfo[9] . " selected>" . $userinfo[9] . "</option>
	<option title=Other>Other</option>
	<option title=Alabama>Alabama</option>
	<option title=Alaska>Alaska</option>
	<option title=Arizona>Arizona</option>
	<option title=Arkansas>Arkansas</option>
	<option title=California>California</option>
	<option title=Colorado>Colorado</option>
	<option title=Connecticut>Connecticut</option>
	<option title=Delaware>Delaware</option>
	<option title=Florida>Florida</option>
	<option title=Georgia>Georgia</option>
	<option title=Hawaii>Hawaii</option>
	<option title=Idaho>Idaho</option>
	<option title=Illinois>Illinois</option>
	<option title=Indiana>Indiana</option>
	<option title=Iowa>Iowa</option>
	<option title=Kansas>Kansas</option>
	<option title=Kentucky>Kentucky</option>
	<option title=Louisiana>Louisiana</option>
	<option title=Maine>Maine</option>
	<option title=Maryland>Maryland</option>
	<option title=Massachusetts>Massachusetts</option>
	<option title=Michigan>Michigan</option>
	<option title=Minnesota>Minnesota</option>
	<option title=Mississippi>Mississippi</option>
	<option title=Missouri>Missouri</option>
	<option title=Montana>Montana</option>
	<option title=Nebraska>Nebraska</option>
	<option title=Nevada>Nevada</option>
	<option title=NewHampshire>New Hampshire</option>
	<option title=NewJersey>New Jersey</option>
	<option title=NewMexico>New Mexico</option>
	<option title=NewYork>New York</option>
	<option title=NorthCarolina>North Carolina</option>
	<option title=NorthDakota>North Dakota</option>
	<option title=Ohio>Ohio</option>
	<option title=Oklahoma>Oklahoma</option>
	<option title=Oregon>Oregon</option>
	<option title=Pennsylvania>Pennsylvania</option>
	<option title=RhodeIsland>Rhode Island</option>
	<option title=SouthCarolina>South Carolina</option>
	<option title=SouthDakota>South Dakota</option>
	<option title=Tennessee>Tennessee</option>
	<option title=Texas>Texas</option>
	<option title=Utah>Utah</option>
	<option title=Vermont>Vermont</option>
	<option title=Virginia>Virginia</option>
	<option title=Washington>Washington</option>
	<option title=WestVirginia>West Virginia</option>
	<option title=Wisconsin>Wisconsin</option>
	<option title=Wyoming>Wyoming</option>
</select>";
echo "  ZIP:<input type=\"text\" name=\"zipcode\" value=\"" . $userinfo[10] . "\" required></p>";
echo "<p style=\"text-align:center;\">Select a default account to be used in transfers! <br>(NOTE! If no account is selected, you will not be able to recieve moeny transfers from other bank customers!)";
echo "<p style=\"text-align:center;\">Current Default Account:";

//Retreive users accounts
$accsql = "SELECT accNum, accName FROM accounts where username = '" . $_SESSION['username'] . "';";
$accresult = $acc->query($accsql);

echo "<br><select name=\"defaultAcc\"><option value=\"0\">None Selected!</option>";

//Create option of all accounts
for($i = 0; $i < $accresult->num_rows; $i++)
{
	$account = $accresult->fetch_row();

	//Check if default account
	if($account[0] == $userinfo[12])
	{
		echo "<option value=\"" . $account[0] . "\" selected>" . $account[1] . "</option>";
	}
	else
	{

		echo "<option value=\"" . $account[0] . "\">" . $account[1] . "</option>";
	}
}
?>

        </select>
      </p>
      <p style="text-align:center;"><input type="submit" value="Save Changes" style="background-color:Green; color:White; border:2px solid Green;">
      <input type="button" value="Cancel" onclick="location.href='success.php'" style="background-color:#FFBF00; color:White; border:2px solid #FFBF00;"></p>
    </form>
  </body>
</html>
