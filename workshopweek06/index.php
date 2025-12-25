<?php
include 'db.php';

// Handle search by category
$searchCategory = isset($_GET['category']) ? trim($_GET['category']) : '';

if ($conn instanceof PDO) {
    if ($searchCategory !== '') {
        $sql = "SELECT * FROM books WHERE category LIKE :category";
        $stmt = $conn->prepare($sql);
        if ($stmt && $stmt->execute([':category' => "%$searchCategory%"])) {
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $books = [];
        }
    } else {
        $sql = "SELECT * FROM books";
        $stmt = $conn->prepare($sql);
        if ($stmt && $stmt->execute()) {
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $books = [];
        }
    }
} else {
    $books = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .form-container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto;
            padding: 32px 24px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
        }
        h2 {
            text-align: center;
            color: #4f46e5;
            margin-bottom: 24px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-weight: 500;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #c7d2fe;
            border-radius: 8px;
            background: #f1f5f9;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #6366f1;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #6366f1 0%, #818cf8 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.08);
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #818cf8 0%, #6366f1 100%);
        }
        .table-container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #4f46e5;
            color: #fff;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        tr:hover {
            background: #f9fafb;
        }
        .search-container {
            max-width: 400px;
            margin: 20px auto 0 auto;
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(60, 72, 88, 0.08);
        }
        .search-container form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .search-container input[type="text"] {
            margin-bottom: 0;
        }
        .clear-link {
            margin-left: 10px;
            color: #6366f1;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .clear-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add a Book</h2>
        <form action="add_book.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br>

            <input type="submit" value="Add Book">
        </form>
    </div>

    <div class="search-container">
        <form method="get" action="">
            <label for="category-search" style="margin-bottom:0;">Search by Category:</label>
            <input type="text" id="category-search" name="category" value="<?php echo htmlspecialchars($searchCategory); ?>" placeholder="Enter category">
            <input type="submit" value="Search">
            <?php if ($searchCategory !== ''): ?>
                <a href="index.php" class="clear-link">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="table-container">
        <h2>Library Books</h2>
        <?php if (!empty($books)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td><?php echo htmlspecialchars($book['category']); ?></td>
                            <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                            <td>
                                <a href="edit_book.php?id=<?php echo $book['book_id']; ?>">Edit</a> |
                                <a href="delete_book.php?id=<?php echo $book['book_id']; ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books found in the database.</p>
        <?php endif; ?>
    </div>
</body>
</html>