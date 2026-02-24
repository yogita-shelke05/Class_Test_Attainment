<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #FFF3E0; text-align: center; color: #333; }
        .container { background: #ffffff; padding: 25px; width: 400px; margin: auto; border-radius: 12px; 
                    box-shadow: 4px 4px 15px rgba(0,0,0,0.1); border-top: 5px solid #FFB74D; }
        button { background: #FF7043; color: white; padding: 12px; border: none; width: 100%;
                 border-radius: 8px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        button:hover { background: #E64A19; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
        <p>You have successfully logged in.</p>

        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>

</body>
</html>
