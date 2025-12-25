<?php
include 'db.php';
$sql = "INSERT INTO books
VALUES(NULL,'$_POST[title]','$_POST[author]','$_POST[category]','$_POST[quantity]')";
if ($conn && $conn instanceof mysqli) {
	$conn->query($sql);
} else {
	die("Database connection failed.");
}