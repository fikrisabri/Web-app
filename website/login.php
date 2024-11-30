<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database credentials
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "carrentalservices";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check for the admin username and password
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Admin login successful, set session
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit;
    } else {
        // Invalid login
        echo "<script>alert('Invalid credentials'); window.location.href='login.html';</script>";
    }

    $conn->close();
}
?>