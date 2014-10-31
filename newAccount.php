<?php
//Username and password for mySQL server
$servername = "104.131.156.252";
$username = "root";
$password = "rtbank";
$db = "loginAccounts";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $db, $port);


// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

//Check for null strings and get user info
if(empty($_REQUEST['username']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userid = $_REQUEST['username'];
}
if(empty($_REQUEST['password']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userpass = $_REQUEST['password'];
}
if(empty($_REQUEST['first']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userfname = $_REQUEST['first'];
}
if(empty($_REQUEST['last']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userlname = $_REQUEST['last'];
}
if(empty($_REQUEST['address']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $useradd = $_REQUEST['address'];
}

//Check if account name taken
$sql = "SHOW TABLES LIKE '" . $userid . "';";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
  header("Location:takenReg.html");
  $conn->close();
  exit();
}

$newAccount = "CREATE TABLE " . $userid . " (firstName VARCHAR(255), lastName VARCHAR(255),
              accountName VARCHAR(255), password VARCHAR(255), address VARCHAR(255));";
              
$conn->query($newAccount);

$values = "INSERT INTO " . $userid . " ( firstName, lastName, accountName, password, address)
          VALUES ('" . $userfname . "', '" . $userlname . "', '" . $userid . "', '" . $userpass .
          "', '" . $useradd . "');";
          
$conn->query($values);

header("Location:index.html");
$conn->close();
?>
