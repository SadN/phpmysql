<?php
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
     or die ("Unable to select database: " . mysql_error());

if (isset($_POST['delete']) && isset($_POST['name']))
  {
    $name = get_post('name');
    $query = "DELETE FROM characters WHERE name='$name'";

    if (!mysql_query($query, $db_server))
      echo "DELETE failed: $query<br />" . mysql_error() . "<br /><br />";
  }

if (isset($_POST['name']) &&
    isset ($_POST['sex']) &&
    isset ($_POST['ip']))
  {
    $name = get_post('name');
    $sex = get_post('sex');
    $ip = get_post('ip');

    $query = "INSERT INTO characters VALUES" .
      "('$name', '$sex', '$ip')";

    if(!mysql_query($query, $db_server))
      echo "INSERT failed: $query<br />" . mysql_error() . "<br /> <br />";
	   
  }

echo <<<_END
<form action="sqltest.php" method = "post"><pre>
Name <input type = "text" name = "name" />
Sex <input type = "text" name = "sex" />
Personality <input type = "text" name = "ip" />
  <input type = "submit" value= "ADD" />
</pre></form>
_END;

$query = "SELECT * FROM characters";
$result = mysql_query($query);

if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);

for ($j=0; $j< $rows; ++$j)
  {
    $row = mysql_fetch_row($result);
    echo <<<_END
      <pre>
      Name $row[0]
      Sex $row[1]
      Personality $row[2]
      </pre>
      <form action="sqltest.php" method="post">
      <input type="hidden" name="delete" value="yes" />
      <input type="hidden" name="name" value="$row[0]" />
      <input type="submit" value="DELETE" /></form>
      _END;
  }

mysql_close($db_server);

function get_post($var)
{
  return mysql_real_escape_string($_POST[$var]);
}

?>