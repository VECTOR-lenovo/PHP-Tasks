<?php
$fruits = "Apple, Banana, Grape, Orange";
$fruitsArray = explode(", ", $fruits);

foreach ($fruitsArray as $fruit) {
    echo $fruit . "\n";
}

echo "<br>";
echo implode(" | ", $fruitsArray);
?>