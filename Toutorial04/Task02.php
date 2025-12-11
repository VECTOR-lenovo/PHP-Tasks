<?php
$temp = 22;
echo "Temperature: $temp °C ";
if ($temp < 15) {
    echo "Cold";
} elseif ($temp <= 30) {
    echo "Warm";
} else {
    echo "Hot";
}