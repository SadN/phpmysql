<?php
echo <<<_END
<html>
<head>
<title>Form test</title>
</head>
<body>
<form method="post" action="formtest.php">
    What is your name?
    <input type="text" name="name"> </input>
<input type="submit" value="kataxwrisi"</input><br />
Male <input type="radio" name="sex" value="M" />
Female <input type="radio" name='sex' value="F" />

</form>
</body>
</html>
_END;
?>