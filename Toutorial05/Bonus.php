<?php
$name = "John Doe";
$email = "john@example.com";
$message = "Hello there!";

$name = htmlspecialchars(trim($name));
$email = htmlspecialchars(trim($email));
$message = htmlspecialchars(trim($message));

$timestamp = date('Y-m-d H:i:s');
$csvLine = "$timestamp,$name,$email,$message\n";

file_put_contents('contacts.csv', $csvLine, FILE_APPEND);

$contacts = file('contacts.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Logger</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h2>Contact Submissions</h2>
    <table>
        <tr>
            <th>Timestamp</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo explode(',', $contact)[0]; ?></td>
                <td><?php echo explode(',', $contact)[1]; ?></td>
                <td><?php echo explode(',', $contact)[2]; ?></td>
                <td><?php echo explode(',', $contact)[3]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
