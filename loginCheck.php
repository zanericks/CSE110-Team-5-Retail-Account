<?php

$servername = "104.131.156.252";
$username = "root";
$password = "rtbank";

$conn = new mysqli($servername, $username, $password);

echo '<p>Mysqli successfully running</p>';
// Check connection
if ($conn->connection_error)
{
	die("Connection failed: " . $conn->connect_error);
}

echo "<p>Connected successfully</p>";





  mysql_select_db('loginAccounts', $link);
  $pass = 'SELECT password FROM ' + username.value;
     
  if(mysql_query($pass, $link) == password.value)
  {
    header('Location:success.html');
  }
  else
  {
    echo 'Invalid username or password';
  }
?>

