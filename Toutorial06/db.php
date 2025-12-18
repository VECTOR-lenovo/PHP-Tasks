<?php
$host = 'localhost';
$db_name = 'school_db';
$db_user = 'root';
$db_pass = '';

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8",
        $db_user,
        $db_pass
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: db.php");
    exit;
}

$stmt = $conn->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        margin: 0;
        padding: 30px;
    }
    form {
        background: #fff;
        padding: 20px 30px 15px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        margin-bottom: 30px;
        max-width: 400px;
    }
    legend {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }
    label {
        display: block;
        margin-top: 10px;
        color: #444;
    }
    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 7px 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1em;
    }
    input[type="submit"] {
        margin-top: 15px;
        background: #007bff;
        color: #fff;
        border: none;
        padding: 9px 18px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background 0.2s;
    }
    input[type="submit"]:hover {
        background: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
    }
    th {
        background: #007bff;
        color: #fff;
        font-weight: 600;
    }
    tr:nth-child(even) {
        background: #f2f2f2;
    }
    tr:hover {
        background: #e9f5ff;
    }
    a {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
        transition: color 0.2s;
    }
    a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>

<form action="student_details.php" method="post">
    <legend>Add New Student</legend>
    <label for="student_name">Name:</label>
    <input type="text" id="student_name" name="student_name" required>
    <label for="student_email">Email:</label>
    <input type="email" id="student_email" name="student_email" required>
    <label for="student_course">Course:</label>
    <input type="text" id="student_course" name="student_course" required>
    <input type="submit" value="Add Student">
</form>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td><?= htmlspecialchars($student['course']) ?></td>
            <td>
                <a href="edit_student.php?id=<?= $student['id'] ?>">Edit</a>
                <a href="db.php?delete=<?= $student['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>