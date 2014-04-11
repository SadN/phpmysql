<?php
$director[] = "James Ivory";
$director[] = "Sergei Eisenstein";
$director[] = "Woody Allen";
$director[] = "Pedro Almodovar";
$director[] = "Michelangelo Antonioni";


$j=0;

foreach ($director as $item)
{
  echo "$j: $item<br/>";
  ++$j;
}
?>