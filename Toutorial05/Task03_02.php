<?php
$file = fopen("note.txt", "r");
echo fread($file, filesize("note.txt"));
fclose($file);
?>