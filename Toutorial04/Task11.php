<?php
$users = [
    ["email" => "ram@gmail.com"],
    ["email" => "sita@gmail.com"],
    ["email" => "hari@gmail.com"]
];

$newEmail = "john@gmail.com"; 

$exists = false;
foreach ($users as $user) {
    if (isset($user['email']) && $user['email'] === $newEmail) {
        $exists = true;
        break;
    }
}

if ($exists) {
    echo "Email already exists";
} else {
    echo "Email available";
}