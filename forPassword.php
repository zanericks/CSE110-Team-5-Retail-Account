<?php
require('helper.php');

$db = "loginAccounts";
$conn = connRTServer( $db);

// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

//Check for null strings and get user info
if(empty($_REQUEST['username']))
{
  header("Location:invalidUserNameForResetPW.html");
  $conn->close();
  exit();
}

if(empty($_REQUEST['email']))
{
  header("Location:invalidEmailForResetPW.html");
  $conn->close();
  exit();
}

$userid = $_REQUEST['username'];
$useremail = $_REQUEST['email'];


//Check if account name taken
$sql = "SELECT accountName, email FROM " . $userid . " ;";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
  //dbuserinfo[0] is username, dbuserinfo[1] is email
  $dbuserinfo = $result->fetch_row();
  $dbuserid = $dbuserinfo[0];
  $dbuseremail = $dbuserinfo[1];

  // if both correct, send reset email
  if($userid == $dbuserid && $dbuseremail == $useremail)
  {
// in email, have a button that will allow user to click to redirect them to
// page to reset password (might have to send email in HTML form)

    $to = $dbuseremail;
    $subject = 'This is subject';
    $message = 'This is body of email';
    $from = "From: RT Bank <admin@rtbank.com>";
    $retval = mail($to,$subject,$message,$from);

if ( $retval ) 
{   
echo("<p>Email successfully sent!</p>");  
    header("Location:successForResetPW.html");
} 
else
 {   
echo("<p>Email delivery failed :(</p>"); 
 }


    $conn->close();
    exit();
  }
  else
  {
    header("Location:invalidInfoForResetPW.html");
    $conn->close();
    exit();
  }
}


?>
