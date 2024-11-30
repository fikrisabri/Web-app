<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Admin Dashboard</h1>
        </a>
        <p>Hello, <?php echo $_SESSION['admin']; ?>! You are logged in.</p>
        <a href="http://localhost/website/adminpage.php">Admin</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>