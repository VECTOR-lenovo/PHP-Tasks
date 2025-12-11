<?php

try {
    $numerator = 10;
    $denominator = 0;
    
    if ($denominator == 0) {
        throw new Exception("Error: Division by zero is not allowed!");
    }
    
    $result = $numerator / $denominator;
    echo "Result: " . $result;
    
} catch (Exception $e) {
    echo "Caught Exception: " . $e->getMessage();
}

?>