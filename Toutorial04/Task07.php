<?php

$message = '';
$color = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '' || $email === '') {
        $message = 'Please fill out all fields.';
        $color = 'red';
    } else {
        $message = 'All good!';
        $color = 'green';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Simple Form</title>
</head>
<body>
    <?php if ($message !== ''): ?>
        <p style="color: <?= htmlspecialchars($color) ?>;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Full Name
            <input type="text" name="name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">
        </label>
        <br>
        <label>Email
            <input type="text" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        </label>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>