<?php
echo <<<_END
<html><head><title>Anevasma</title></head>
<body>
<form method='post' action='upload.php' enctype='multipart/form-data'>
    Select a file :
<input type='file' name='filename' size='10' />
<input type='submit' value='metafortosi' /></form>
_END;

if ($_FILES)
  {
    $name = $_FILES['filename']['name'];

    switch($_FILES['filename']['type'])
      {
      case 'image/jpeg': $ext = 'jpg'; break;
      case 'image/gif': $ext = 'gif'; break;
      case 'image/png': $ext = 'png'; break;
      case 'image/tiff': $ext = 'tif'; break;
      default: $ext = ''; break;
      }
    if($ext)
      {
	$n = "image.$ext";
	move_uploaded_file($_FILES['filename']['tmp_name'], $n);
	echo "Anevike to arxeio '$name' as '$n':<br/>";
      }
    else echo "'$name' is not an accepted file";
  }
 else echo "No file has been uploaded";
echo "</body></html>";
?>