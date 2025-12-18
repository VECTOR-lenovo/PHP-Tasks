<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];
    $course = $_POST['student_course'];

    $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $course]);
}

header("Location: db.php");
exit;