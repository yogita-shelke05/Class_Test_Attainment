<?php
include 'config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $enrollment = $_POST['enrollment'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password

    // Check if email or roll_no or enrollment already exists
    $check_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR roll_no = ? OR enrollment = ?");
    $check_query->bind_param("sss", $email, $roll_no, $enrollment);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('User already exists with this Email, Roll No, or Enrollment No. Try again!');</script>";
    } else {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (fullname, roll_no, email, enrollment, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $full_name, $roll_no, $email, $enrollment, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration Successful!'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Registration</title>
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

        .register-box {
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
        input[type="email"],
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

    <div class="register-box">
        <h2>Student Registration</h2>
        <form method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="roll_no" placeholder="Roll No" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="enrollment" placeholder="Enrollment No" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>
