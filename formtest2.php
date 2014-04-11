<?php
if (isset($_POST['name'])) $name = $_POST['name'];
 else $name = "(Not entered)";

echo <<<_END
<html>
<head>
<title>Form test</title>
</head>
<body>
Your name is: $name <br />
<form method="post" action="formtest2.php">
    What is your name?
    <input type="text" name="name"> </input>
<input type="submit" value="kataxwrisi"</input><br />

Epilogi <input type="checkbox" name="checkboxname" value="checkbox_value" checked="checked" /><br />

<textarea name="textarea_name" cols=10 rows=5 wrap="soft">
This is some default text
</textarea>

</form>
</body>
</html>
_END;
?>