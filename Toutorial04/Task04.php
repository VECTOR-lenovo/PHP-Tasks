<?php

$word = '';
$reversed = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $word = isset($_POST['word']) ? trim($_POST['word']) : '';

    $len = strlen($word);
    for ($i = $len - 1; $i >= 0; $i--) {
        $reversed .= $word[$i];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reverse a Word</title>
</head>
<body>
    <form method="post">
        <label>
            Enter a word:
            <input type="text" name="word" value="<?php echo htmlspecialchars($word, ENT_QUOTES); ?>">
        </label>
        <button type="submit">Reverse</button>
    </form>

    <?php if ($reversed !== ''): ?>
        <p>Reversed: <?php echo htmlspecialchars($reversed, ENT_QUOTES); ?></p>
    <?php endif; ?>
</body>
</html>