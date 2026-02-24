<?php
session_start();
include 'db_connect.php'; // $conn should be connected inside this

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin check (can be moved to DB if needed)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Invalid credentials!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
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
            width: 400px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border-top: 6px solid #FFA726;
        }

        h2 {
            color: #FB8C00;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
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
        <h2>Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Admin Username" required>
            <input type="password" name="password" placeholder="Admin Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
