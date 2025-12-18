<?php
require 'db.php';

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];
    $course = $_POST['student_course'];

    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->execute([$name, $email, $course, $id]);
    header("Location: db.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>

<!-- <stle> -->
</head>
<body>
    <div class="edit-form-container">
        <h2>Edit Student</h2>
        <form method="post">
            <label>Name:
                <input type="text" name="student_name" value="<?= htmlspecialchars($student['name']) ?>" required>
            </label>
            <label>Email:
                <input type="email" name="student_email" value="<?= htmlspecialchars($student['email']) ?>" required>
            </label>
            <label>Course:
                <input type="text" name="student_course" value="<?= htmlspecialchars($student['course']) ?>" required>
            </label>
            <input type="submit" value="Update Student">
        </form>
        <a class="back-link" href="db.php">&larr; Back to Student List</a>
    </div>
</body>
</html>