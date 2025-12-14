<!DOCTYPE html>
<html>
<head>
    <title>Workshop Week 05</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            font-size: 28px;
        }
        nav {
            background-color: #444;
            padding: 10px;
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        nav ul li a:hover {
            color: #ffd700;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        form {
            margin: 20px 0;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button, input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            padding: 10px;
            background-color: #e8f5e9;
            border-radius: 5px;
            margin: 10px 0;
        }
        .error {
            color: red;
            padding: 10px;
            background-color: #ffebee;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Workshop Week 05</h1>
        <p>Student Management & Portfolio Upload System</p>
    </header>

    <div class="container">
