<?php
$file = fopen("note.txt", "w");
fwrite($file, "This is a simple note.");
fwrite($file, "\nThis is the second line of the note.");
fclose($file);
?>
