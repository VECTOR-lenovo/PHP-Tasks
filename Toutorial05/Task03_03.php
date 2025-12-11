<?php
$file = fopen("note.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    echo $line . "<br>";
}
fclose($file);
?>