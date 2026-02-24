<?php
$conn = new mysqli("localhost", "root", "", "class_test_co");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
