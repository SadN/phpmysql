<?php

require_once "login.php";

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die ("Unable to connect to MySQL: " . mysql_error());
mysql_select_db($db_database)
     or die ("Unable to select database: " . mysql_error());

$query = "CREATE TABLE users (
forename VARCHAR(32) NOT NULL,
surname VARCHAR(32) NOT NULL,
username VARCHAR(32) NOT NULL UNIQUE,
password VARCHAR(32) NOT NULL
)";

$result = mysql_query($query);
if (!$result) die ("Unable to access database: " . mysql_error());

$salt1 = "QW";
$salt2 = "ER";

$forename = 'Michael';
$surname = 'Haneke';
$username = 'miha';
$password = 'michaelpass';
$token = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token); 

$forename = 'Reiner Werner';
$surname = 'Fassbinder';
$username = 'fass';
$password = 'fasspass';
$token = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token);

function add_user($fn, $sn, $un, $pw)
{
  $query = "INSERT INTO users VALUES ('$fn', '$sn', '$un', '$pw')";
  $result = mysql_query($query);
  if (!$result) die ("Database access failed: " . mysql_error());
}
?>