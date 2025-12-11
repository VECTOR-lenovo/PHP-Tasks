<?php
// /C:/xampp/htdocs/index.php

date_default_timezone_set('UTC'); // adjust as needed

$name = 'john doe';
$today = date('Y-m-d');
$hour = (int) date('G');

if ($hour < 12) {
	$period = 'morning';
} elseif ($hour < 18) {
	$period = 'afternoon';
} else {
	$period = 'evening';
}

echo "Name: $name<br>";
echo "Date: $today<br>";
echo "It is currently $period.";