<?php
$file = fopen("note.txt", "a");
fwrite($file, "\nAppended via PHP tutorial.");
fclose($file);
$file = fopen("note.txt", "r");
$content = fread($file, filesize("note.txt"));
fclose($file);
echo $content;
?>
