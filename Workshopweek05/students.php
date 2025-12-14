<?php
require 'header.php';
?>

<h2>Registered Students</h2>

<?php
$file = 'students.txt';

if (file_exists($file)) {
    $studentsData = file_get_contents($file);
    
    if (!empty($studentsData)) {
        $lines = explode("\n", trim($studentsData));
        
        if (count($lines) > 0) {
            echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>";
            echo "<tr style='background-color: #333; color: white;'>";
            echo "<th style='padding: 10px; border: 1px solid #ddd;'>Name</th>";
            echo "<th style='padding: 10px; border: 1px solid #ddd;'>Email</th>";
            echo "<th style='padding: 10px; border: 1px solid #ddd;'>Skills</th>";
            echo "</tr>";
            
            foreach ($lines as $line) {
                if (!empty($line)) {
                    $parts = explode(" | ", $line);
                    
                    if (count($parts) === 3) {
                        $name = htmlspecialchars(trim($parts[0]));
                        $email = htmlspecialchars(trim($parts[1]));
                        $skills = htmlspecialchars(trim($parts[2]));
                        
                        echo "<tr>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $name . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $email . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $skills . "</td>";
                        echo "</tr>";
                    }
                }
            }
            
            echo "</table>";
        } else {
            echo "<p style='color: orange;'>No students found in the file.</p>";
        }
    } else {
        echo "<p style='color: orange;'>No students registered yet.</p>";
    }
} else {
    echo "<p style='color: red;'>Student file not found. Please add a student first.</p>";
}
?>

<?php
require 'footer.php';
?>
