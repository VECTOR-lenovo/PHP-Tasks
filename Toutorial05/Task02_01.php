<?php
$string = "Full Stack Development with PHP";
echo strlen($string);
echo "<br>";
echo str_word_count($string);
echo "<br>";
echo strrev($string);
echo "<br>";
echo strpos($string, "PHP");
echo "<br>";
echo str_replace("PHP", "JavaScript", $string);
?>