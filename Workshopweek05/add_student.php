<form action="add_student.php"
        method="post">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br><br>
    
        <label for="student_skills">Student skills:</label>
        <input type="text" id="student_skills" name="student_skills" required><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
    
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $name = trim($_POST['student_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $skills = trim($_POST['student_skills'] ?? '');
            
            if (empty($name) || empty($email) || empty($skills)) {
                throw new Exception("All fields are required.");
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }
            
            $skillsArray = array_map('trim', explode(',', $skills));
            $skillsArray = array_filter($skillsArray);
            
            if (empty($skillsArray)) {
                throw new Exception("Skills cannot be empty.");
            }
            
            $studentData = $name . " | " . $email . " | " . implode(', ', $skillsArray) . "\n";
            
            $file = 'students.txt';
            if (!file_put_contents($file, $studentData, FILE_APPEND)) {
                throw new Exception("Failed to save student information.");
            }
            
            echo "<p style='color: green;'>Student added successfully!</p>";
        } catch (Exception $e) {
            echo "<p style='color: green;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>