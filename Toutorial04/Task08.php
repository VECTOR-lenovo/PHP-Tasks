<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    $hasAt = strpos($email, '@') !== false;
    $hasDot = strpos($email, '.') !== false;
    $atPos  = strpos($email, '@');

    if (!$hasAt || !$hasDot || $atPos === 0 || $email === '') {
        $result = 'Email format incorrect.';
    } else {
        $result = 'Email format OK.';
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    <label>Email: <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"></label>
    <input type="submit" value="Check">
</form>

<?php if (isset($result)) echo $result; ?>

</body>
</html>