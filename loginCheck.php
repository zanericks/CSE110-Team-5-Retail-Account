<?php
require('helper.php');
session_start();

$db = "loginAccounts";
$conn = connRTServer( $db);

// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

//Users inputed info
$userid = $_REQUEST['username'];
$userid = strtolower( $userid );
$userpass = $_REQUEST['password'];

$sql = "SELECT password, accountBlock FROM regUsers WHERE accountName = '" . $userid . "';";
$adsql = "SELECT password FROM admin WHERE accountName = '" . $userid . "';";
$result = $conn->query($sql);
$adresult = $conn->query($adsql);

//Check if account exists
if($result->num_rows == 1)
{
  $comp = $result->fetch_row();

  //Check if account is blocked
  if( $comp[1] > 0 )
  {
    header("Location: accountBlocked.html");
    $conn->close();
    exit();
  }

  $_SESSION['passwordTries']++;

  // get captcha information
  $captcha = $_REQUEST['captcha'];
  $captcha = strtolower( $captcha );
  $answer = "qgphjd";
  $welsql = "SELECT firstname FROM regUsers WHERE accountName = '" . $userid . "';";

  //Check whether or not the captcha should be displayed or if the account should be blocked
  if( $_SESSION['passwordTries'] < 3 )
  { 
    if($comp[0] == $userpass)
    {
      //Grab some user info to display
      $welres = $conn->query($welsql);
      $welcome = $welres->fetch_row();
      $_SESSION["username"] = $userid;
      $_SESSION["password"] = $userpass;
      $_SESSION['passwordTries'] = 0;
      $_SESSION['firstname'] = $welcome[0];
      header("Location: success.php");
    }
    else
    {
      header("Location: invalIndex.html");
    }
  }
  else if($_SESSION['passwordTries'] == 3)
  {
    // go to captcha
    header("Location: captcha.html");
  }
  else if($_SESSION['passwordTries'] == 4)
  {
    // if password and captcha are both correct, then login
    if( $comp[0] == $userpass && $captcha == $answer )
    {
      $welres = $conn->query($welsql);
      $welcome = $welres->fetch_row();
      $_SESSION["username"] = $userid;
      $_SESSION["password"] = $userpass;
      $_SESSION['passwordTries'] = 0;
      $_SESSION['firstname'] = $welcome[0];
      header("Location: success.php");
    }
    else
    {
      // blocks account by changing flag in database
      $othersql = "UPDATE regUsers SET accountBlock = 1 WHERE accountName = '" . $userid . "';";
      $conn->query($othersql);
      $_SESSION['passwordTries'] = 0;

      header("Location: accountBlocked.html");
      $conn->close();
      exit();
    }
  } 
}
//Check if admin/teller account
else if($adresult->num_rows == 1)
{
	$adcomp = $adresult->fetch_row();
	if($adcomp[0] == $userpass)
	{
		$_SESSION['username'] = $userid;
		$_SESSION['password'] = $userpass;
		header("Location: admin.php");
	}
	else
	{
		header("Location:invalIndex.html");
	}
}	
else
{
	header("Location:invalIndex.html");
}

$conn->close();
?>

