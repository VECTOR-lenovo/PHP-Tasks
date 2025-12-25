<?php
include 'db.php';

// Ensure $conn is initialized
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=$id";
$conn->query($sql);