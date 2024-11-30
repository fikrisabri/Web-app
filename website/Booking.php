<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrentalservices";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Connection Failed: .$conn->connect_error");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	 $Phone_No = isset($_POST["Phone_No"]) ? $_POST["Phone_No"] : '';
    $Your_Name = isset($_POST["Your_Name"]) ? $_POST["Your_Name"] : '';
    $Email_Address = isset($_POST["Email_Address"]) ? $_POST["Email_Address"] : '';
    $Booking_Date = isset($_POST["Booking_Date"]) ? $_POST["Booking_Date"] : '';
    $Return_Date = isset($_POST["Return_Date"]) ? $_POST["Return_Date"] : '';
    $Select_Cars = isset($_POST["s-select"]) ? $_POST["s-select"] : '';
    $Messages = isset($_POST["Messages"]) ? $_POST["Messages"] : '';

    $sql = "INSERT INTO users (Phone_No, Your_Name, Email_Address, Booking_Date,Return_Date, Select_cars, Messages) VALUES ('$Phone_No', '$Your_Name', '$Email_Address', '$Booking_Date', '$Return_Date', '$Select_Cars', '$Messages')";

    if($conn->query($sql) == TRUE){
    	echo "Booking Successfully";
    }else{
    echo "Error: " .$sql . "<br>" .$conn->error;
    }
}
$conn->close();


?>