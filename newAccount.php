<?php
require('helper.php');

$db = "loginAccounts";
$conn = connRTServer($db);

//Retrieves user submitted info and formates where need be
$userid = $_REQUEST['username'];
$userid = strtolower( $userid );
$userpass = $_REQUEST['password'];
$userfname = $_REQUEST['first'];
$userlname = $_REQUEST['last'];
$useradd1 = $_REQUEST['address1'];
$useradd2 = $_REQUEST['address2'];
$userphone = $_REQUEST['phone'];
$useremail = $_REQUEST['email'];
$usercity = $_REQUEST['city'];
$userstate = $_REQUEST['state'];
$userzip = $_REQUEST['zipcode'];


///// Checks invalid format for fields /////

//Check if account name taken
$sql = "select * from regUsers where accountName = '" . $userid . "';";
$adsql = "select * from admin where accountName = '" . $userid . "';";
$result = $conn->query($sql);
$adresult = $conn->query($adsql);

if($result->num_rows > 0 || $adresult->num_rows > 0)
{
  header("Location:takenReg.html");
  $conn->close();
  exit();
}

//Check if email taken
if(!newEmail($useremail))
{
  header("Location:emailTakenReg.html");
  $conn->close();
  exit();
}

$values = "INSERT INTO regUsers ( firstName, lastName, accountName, password, phone, email, address1, address2, city, state, zipcode, 
           accountBlock, defaultAccount) VALUES ('" . $userfname . "', '" . $userlname . "', '" . $userid . "', '" . $userpass . "', '"
           . $userphone . "', '" . $useremail . "', '" . $useradd1 . "', '" . $useradd2 . "', '" . $usercity . "', '" . $userstate . "', '" 
           . $userzip . "', '0', '0');";
          
$conn->query($values);

header("Location:index.html");
$conn->close();
?>
