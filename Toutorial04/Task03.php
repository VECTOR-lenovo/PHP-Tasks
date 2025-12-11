<?php
// Task03.php
$input = '';
$number = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['number'] ?? '');
    if ($input === '') {
        $error = 'Please enter a number.';
    } elseif (!is_numeric($input)) {
        $error = 'Please enter a valid number.';
    } else {
        $number = (int)$input;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Multiplication Table</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; margin-top: 10px; }
        td, th { border: 1px solid #ccc; padding: 6px 10px; text-align: center; }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input id="number" name="number" type="number" step="1" value="<?php echo htmlspecialchars($input); ?>">
        <button type="submit">Generate</button>
    </form>

    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($number !== null): ?>
        <h2>Multiplication table for <?php echo $number; ?> (1 to 10)</h2>
        <table>
            <thead>
                <tr><th>Multiplier</th><th>Result</th></tr>
            </thead>
            <tbody>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <tr>
                    <td><?php echo $i; ?> × <?php echo $number; ?></td>
                    <td><?php echo $i * $number; ?></td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>