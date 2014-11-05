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

// 6 is the minimum length for password
if(strlen($_REQUEST['password']) < 6 )
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
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

if(empty($_REQUEST['address1']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $useradd1 = $_REQUEST['address1'];
}

if( !empty($_REQUEST['address2']))
{
  $useradd2 = $_REQUEST['address2'];
}
else
{
  $useradd2 = "";
}

if(empty($_REQUEST['city']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $usercity = $_REQUEST['city'];
}

if(empty($_REQUEST['state']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userstate = $_REQUEST['state'];
}

if(empty($_REQUEST['zipcode']))
{
  header("Location:emptyReg.html");
  $conn->close();
  exit();
}
else
{
  $userzip = $_REQUEST['zipcode'];
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
              accountName VARCHAR(255), password VARCHAR(255), address1 VARCHAR(255), address2 VARCHAR(255),
              city VARCHAR(255), state VARCHAR(255), zipcode VARCHAR(255));";
              
$conn->query($newAccount);

$values = "INSERT INTO " . $userid . " ( firstName, lastName, accountName, password, address1, address2, city, state, zipcode)
          VALUES ('" . $userfname . "', '" . $userlname . "', '" . $userid . "', '" . $userpass . "',
          '" . $useradd1 . "', '" . $useradd2 . "', '" . $usercity . "', '" . $userstate . "', '" . $userzip . "');";
          
$conn->query($values);

header("Location:index.html");
$conn->close();
?>
