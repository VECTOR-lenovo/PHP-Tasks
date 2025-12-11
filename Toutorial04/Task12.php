<?php
$json = file_get_contents(__DIR__ . '/products.json');


$products = json_decode($json, true);


if (!is_array($products)) {
        echo "Failed to read products.";
        exit;
}


foreach ($products as $product) {
        echo 'Name: ' . htmlspecialchars($product['name']) . ' - Price: ' . htmlspecialchars($product['price']) . '<br>';
}
?>