<?php
session_start();
$conn = new mysqli("localhost", "root", "", "class_test_co");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST['enrollment'];
    $password = $_POST['password'];

    // Fetch user from database using Enrollment No.
    $sql = "SELECT * FROM users WHERE enrollment = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $enrollment);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; // Store user ID
            $_SESSION['user_name'] = $user['fullname']; // Store user name

            // ✅ Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Enrollment Number not found!'); window.location.href='login.php';</script>";
    }
}
$conn->close();
?>
