<?php
session_start();
if (!isset($_SESSION['enrollment'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Test - CO Marks</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fef9f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1.5px solid #ffc107;
            background-color: #fffdf7;
            font-size: 16px;
            transition: 0.3s ease;
        }

        select:focus, input[type="number"]:focus {
            border-color: #ffa000;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 160, 0, 0.3);
        }

        input[type="submit"] {
            background-color: #ffc107;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ffa000;
        }

        .co-section {
            margin-top: 20px;
            padding: 15px;
            border-radius: 15px;
            background-color: #fff7e6;
            border: 1px solid #ffe082;
        }

        .co-section h3 {
            margin-top: 0;
            color: #ff8f00;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Select PA Test and Number of COs</h2>
    <form method="post">
        <label for="test_type">PA Test:</label>
        <select name="test_type" id="test_type" required>
            <option value="PA Test 1">PA Test 1</option>
            <option value="PA Test 2">PA Test 2</option>
        </select>

        <label for="co_count">Number of COs (Total = 20 marks):</label>
        <select name="co_count" id="co_count" required>
            <?php for ($i = 1; $i <= 5; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>

        <input type="submit" name="proceed" value="Proceed">
    </form>

    <?php
    if (isset($_POST['proceed'])) {
        $co_count = $_POST['co_count'];
        $test_type = $_POST['test_type'];

        echo "<h2>Enter CO-wise Marks</h2>";
        echo "<form method='post' action='save_marks.php'>";
        echo "<input type='hidden' name='co_count' value='$co_count'>";
        echo "<input type='hidden' name='test_type' value='$test_type'>";

        for ($i = 1; $i <= $co_count; $i++) {
            echo "<div class='co-section'>";
            echo "<h3>CO $i</h3>";
            echo "<label>CO-$i Max Marks (e.g., 8):</label>";
            echo "<input type='number' name='co{$i}_outof' min='1' max='20' required>";
            echo "<label>Marks Obtained in CO-$i:</label>";
            echo "<input type='number' name='co{$i}_got' min='0' max='20' required>";
            echo "</div>";
        }

        echo "<input type='submit' name='submit_marks' value='Submit Marks'>";
        echo "</form>";
    }
    ?>
</div>

</body>
</html>
