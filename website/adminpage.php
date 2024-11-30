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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f8f8f8;
        }
        .btn-delete {
            background: #e74c3c;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
         <a href="admin_dashboard.php" class="btn-back">Back to Admin Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Phone No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Booking Date</th>
                    <th>Return Date</th>
                    <th>Car Selected</th>
                    <th>Messages</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "carrentalservices";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo
                         "<tr>
                            <td>" . $row['Phone_No'] . "</td>
                            <td>" . $row['Your_Name'] . "</td>
                            <td>" . $row['Email_Address'] . "</td>
                            <td>" . $row['Booking_Date'] . "</td>
                            <td>" . $row['Return_Date'] . "</td>
                            <td>" . $row['Select_Cars'] . "</td>
                            <td>" . $row['Messages'] . "</td>
                            <td>
                                <form method='POST' action='delete_booking.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $row['Phone_No'] . "'>
                                    <button type='submit' class='btn-delete'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No bookings found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>