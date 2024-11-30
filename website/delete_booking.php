<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrentalservices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the 'id' (or booking ID) from the POST request
    $Phone_No = $_POST['id'];

    // Make sure to properly escape the input to prevent SQL injection
    $Phone_No = $conn->real_escape_string($Phone_No);

    // Use the correct column name (assuming it's 'user_id' or your actual column name)
    $sql = "DELETE FROM users WHERE Phone_No = $Phone_No";   

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully.";
        header("Location: adminpage.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>