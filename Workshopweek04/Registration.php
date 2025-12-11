<style>
    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: auto;
    }

    input {
        margin-bottom: 10px;
        padding: 8px;
        font-size: 16px;
    }

    button {
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>
<form action="" method="POST">
    <input type="text" name="username" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>
<?php
$errors = [];
$success = isset($_GET['success']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($username)) {
        $errors[] = 'Username is required.';
    } elseif (strlen($username) < 3) {
        $errors[] = 'Username must be at least 3 characters long.';
    }

    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    } elseif (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must contain at least one uppercase letter.';
    } elseif (!preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'",.<>?\/\\|`~]/', $password)) {
        $errors[] = 'Password must contain at least one special character.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $users_file = 'users.json';
        $users = file_exists($users_file) ? json_decode(file_get_contents($users_file), true) : [];
        
        $users[] = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        
        file_put_contents($users_file, json_encode($users, JSON_PRETTY_PRINT));
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<?php if ($success): ?>
    <p style="color: green; text-align: center;">Registration successful!</p>
<?php elseif (!empty($errors)): ?>
    <ul style="color: red; text-align: center;">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
