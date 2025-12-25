<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $quantity = intval($_POST['quantity']);

    if (!empty($title) && !empty($author) && !empty($category) && $quantity > 0) {
        $sql = "INSERT INTO books (title, author, category, quantity) VALUES (:title, :author, :category, :quantity)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute([':title' => $title, ':author' => $author, ':category' => $category, ':quantity' => $quantity])) {
            echo "Book added successfully!";
        } else {
            echo "Error adding book!";
        }
    } else {
        echo "All fields required!";
    }
}
?>