<?php
session_start();
$conn = new mysqli("localhost", "root", "", "class_test_co");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST['enrollment'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT enrollment, password FROM users WHERE enrollment = ?");
    $stmt->bind_param("s", $enrollment);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if (strpos($storedPassword, '$2y$') === 0) {
            $valid = password_verify($password, $storedPassword);
        } else {
            $valid = ($password === $storedPassword);
        }

        if ($valid) {
            $_SESSION['enrollment'] = $row['enrollment'];
            $_SESSION['roll_no'] = $row['enrollment'];
            header("Location: classtest.php");
            exit();
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFF8F0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background-color: #ffffff;
            padding: 30px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border-top: 6px solid #FFA726;
        }

        h2 {
            color: #FB8C00;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #FFCC80;
            border-radius: 10px;
            background-color: #FFF3E0;
            font-size: 16px;
        }

        button {
            background-color: #FFA726;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #FB8C00;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Student Login</h2>
        <form method="POST" action="login.php">
            <input type="text" name="enrollment" placeholder="Enrollment No" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
