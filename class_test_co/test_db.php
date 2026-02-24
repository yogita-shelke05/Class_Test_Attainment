<?php
$servername = "localhost";
$username = "root";
$password = ""; // XAMPP default has no password
$database = "class_test_co"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}
?>
