<form action="">
    <?php
    $userInput = "&quot;<script>alert('hack');</script> Welcome&quot;";
    echo $userInput . "<br>";
    
    $safeOutput = htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');
    echo "<p>Safe output: " . $safeOutput . "</p>";
    
    $untrimmed = "&quot; Hello World &quot;";
    $trimmed = trim($untrimmed, "&quot;");
    
    echo "<p>Before trim: " . htmlspecialchars($untrimmed) . "</p>";
    echo "<p>After trim: " . htmlspecialchars($trimmed) . "</p>";
    ?>
</form>