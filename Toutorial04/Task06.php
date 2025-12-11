<?php

$name = $age = $language = '';
$errors = [];
$showPreview = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $language = trim($_POST['language'] ?? '');

    if ($name === '') {
        $errors['name'] = 'Name required';
    } elseif (!preg_match('/^[\p{L}\s\'\-\.]{1,100}$/u', $name)) {
        $errors['name'] = 'Invalid name';
    }

    if ($age === '') {
        $errors['age'] = 'Age required';
    } elseif (filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range"=>0,"max_range"=>150]]) === false) {
        $errors['age'] = 'Invalid age';
    }

    if ($language === '') {
        $errors['language'] = 'Language required';
    } elseif (mb_strlen($language) > 100) {
        $errors['language'] = 'Language too long';
    }

    if (empty($errors)) {
        $showPreview = true;
    }
}

function e($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Task06</title></head>
<body>
<?php if ($showPreview): ?>
    <h2>Preview</h2>
    <p>Name: <?php echo e($name); ?></p>
    <p>Age: <?php echo e($age); ?></p>
    <p>Language: <?php echo e($language); ?></p>
<?php else: ?>
    <h2>Enter details</h2>
    <form method="post">
        <div>
            <label>Name<br><input name="name" value="<?php echo e($name); ?>" maxlength="100"></label>
            <?php if (!empty($errors['name'])) echo '<div style="color:red">'.e($errors['name']).'</div>'; ?>
        </div>
        <div>
            <label>Age<br><input name="age" value="<?php echo e($age); ?>" type="number" min="0" max="150"></label>
            <?php if (!empty($errors['age'])) echo '<div style="color:red">'.e($errors['age']).'</div>'; ?>
        </div>
        <div>
            <label>Language<br><input name="language" value="<?php echo e($language); ?>" maxlength="100"></label>
            <?php if (!empty($errors['language'])) echo '<div style="color:red">'.e($errors['language']).'</div>'; ?>
        </div>
        <button type="submit">Submit</button>
    </form>
<?php endif; ?>
</body>
</html>
