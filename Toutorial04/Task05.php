<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sentence = $_POST['sentence'] ?? '';
    $vowelCount = preg_match_all('/[aeiou]/i', $sentence);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vowel Counter</title>
</head>
<body>
    <form method="post">
        <label>Enter a sentence:
            <input type="text" name="sentence" value="<?php echo isset($sentence) ? htmlspecialchars($sentence) : ''; ?>">
        </label>
        <button type="submit">Count</button>
    </form>

    <?php if (isset($vowelCount)): ?>
        <p>Vowel count: <?php echo $vowelCount; ?></p>
    <?php endif; ?>
</body>
</html>