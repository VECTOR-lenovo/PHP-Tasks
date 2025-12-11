<?php

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    if (strlen($password) < 8) {
        $errors[] = 'Minimum 8 characters required.';
    }
    if (!preg_match('/\d/', $password)) {
        $errors[] = 'Must include at least one number.';
    }
    if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors[] = 'Must include at least one special character.';
    }

    if (empty($errors)) {
        $success = 'Password is valid.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Validation</title>
</head>
<body>
    <?php if ($success): ?>
        <p><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?php echo htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" />
        <button type="submit">Submit</button>
    </form>
</body>
</html>