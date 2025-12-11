<?php

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = isset($_POST['a']) ? (float) $_POST['a'] : 0;
    $b = isset($_POST['b']) ? (float) $_POST['b'] : 0;
    $op = isset($_POST['op']) ? trim(strtolower($_POST['op'])) : '';

    switch ($op) {
        case 'add':
            $result = $a + $b;
            break;
        case 'subtract':
            $result = $a - $b;
            break;
        case 'multiply':
            $result = $a * $b;
            break;
        case 'divide':
            if ($b == 0.0) {
                $error = 'Cannot divide by zero.';
            } else {
                $result = $a / $b;
            }
            break;
        default:
            $error = 'Unknown operation.';
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Basic Calculator</title>
    <style>
      
        .field { margin-bottom: 8px; }
        .output { margin-bottom: 1em; }
    </style>
</head>
<body>
    <form method="post">
        <div class="field"><label>First number: <input type="number" name="a" step="any" required></label></div>
        <div class="field"><label>Second number: <input type="number" name="b" step="any" required></label></div>
        <div class="field"><label>Operation:
            <select name="op">
                <option value="add">add</option>
                <option value="subtract">subtract</option>
                <option value="multiply">multiply</option>
                <option value="divide">divide</option>
            </select>
        </label></div>
        <div class="field"><button type="submit">Calculate</button></div>
    </form>

    <?php if ($error): ?>
        <p class="output" style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php elseif ($result !== null): ?>
        <p class="output">Result: <?php echo htmlspecialchars($result); ?></p>
    <?php endif; ?>
</body>
</html>