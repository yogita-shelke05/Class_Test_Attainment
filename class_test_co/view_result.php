<?php
session_start();
$conn = new mysqli("localhost", "root", "", "class_test_co");

if (!isset($_SESSION['enrollment'])) {
    die("Error: User not logged in.");
}

$enrollment = $_SESSION['enrollment'];
$sql = "SELECT * FROM class_test WHERE enrollment = '$enrollment'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Your Class Test Result</h2>";
    echo "<table border='1'>
            <tr>
                <th>Test Type</th>
                <th>CO1 Attainment</th>
                <th>CO2 Attainment</th>
                <th>CO3 Attainment</th>
                <th>CO4 Attainment</th>
                <th>CO5 Attainment</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $co_attainments = ["-", "-", "-", "-", "-"]; // default

        $co_details = json_decode($row['co_details'], true);
        if (is_array($co_details)) {
            foreach ($co_details as $co) {
                $index = intval(str_replace("CO", "", $co['co'])) - 1;
                if ($index >= 0 && $index < 5) {
                    $co_attainments[$index] = $co['attained'];
                }
            }
        }

        echo "<tr>
                <td>{$row['test_type']}</td>
                <td>{$co_attainments[0]}</td>
                <td>{$co_attainments[1]}</td>
                <td>{$co_attainments[2]}</td>
                <td>{$co_attainments[3]}</td>
                <td>{$co_attainments[4]}</td>
            </tr>";
    }

    echo "</table>";
    echo "<br><a href='edit_classtest.php'>Edit Response</a>";
} else {
    echo "No records found.";
}

$conn->close();
?>
