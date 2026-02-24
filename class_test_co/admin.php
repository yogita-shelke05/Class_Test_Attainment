<?php
session_start();
$conn = new mysqli("localhost", "root", "", "class_test_co");

if (!isset($_SESSION['admin'])) {
    die("Access Denied! Only Admins can view this page.");
}

$sql = "SELECT ct.enrollment, ct.test_type, ct.total_marks, ct.marks_obtained, ct.co_details, u.fullname, u.email 
        FROM class_test ct
        LEFT JOIN users u ON ct.enrollment = u.enrollment
        ORDER BY ct.enrollment";

$result = $conn->query($sql);

$co_summary = [];
$co_percentages = [];
$above_40_counts = [];
$student_count_per_co = [];
$highest_attainment = [];
$lowest_attainment = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Student Records</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ECEFF1;
            color: #263238;
            margin: 0;
            padding: 0;
        }

        h2, h3, h4 {
            text-align: center;
            margin: 20px 0;
            color: #37474F;
        }

        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            background-color: #0277BD;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #F1F8E9;
        }

        a {
            display: inline-block;
            margin: 30px auto;
            text-decoration: none;
            background-color: #FF7043;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #F4511E;
        }

        h4 {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>Admin Panel - Student Records</h2>

    <table>
        <tr>
            <th>Enrollment</th>
            <th>Name</th>
            <th>Email</th>
            <th>Test Type</th>
            <th>Total Marks</th>
            <th>Marks Obtained</th>
            <th>Total %</th>
            <th>CO Details</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) {
            $co_details = json_decode($row['co_details'], true);
            $co_string = "";

            foreach ($co_details as $co) {
                $co_name = $co['co'];
                $attained = $co['attained'];
                $percentage = $co['percentage'];

                $co_string .= "{$co_name}: {$co['got']}/{$co['outof']} ({$attained})<br>";

                if (!isset($co_summary[$co_name])) {
                    $co_summary[$co_name] = ['Yes' => 0, 'No' => 0];
                    $co_percentages[$co_name] = [];
                    $above_40_counts[$co_name] = 0;
                    $student_count_per_co[$co_name] = 0;
                }

                $co_summary[$co_name][$attained]++;
                $co_percentages[$co_name][] = $percentage;
                $student_count_per_co[$co_name]++;

                if ($percentage >= 40) {
                    $above_40_counts[$co_name]++;
                }

                if (!isset($highest_attainment[$co_name]) || $percentage > $highest_attainment[$co_name]) {
                    $highest_attainment[$co_name] = $percentage;
                }

                if (!isset($lowest_attainment[$co_name]) || $percentage < $lowest_attainment[$co_name]) {
                    $lowest_attainment[$co_name] = $percentage;
                }
            }
        ?>
            <tr>
                <td><?= $row['enrollment'] ?></td>
                <td><?= $row['fullname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['test_type'] ?></td>
                <td><?= $row['total_marks'] ?></td>
                <td><?= $row['marks_obtained'] ?></td>
                <td><?= round(($row['marks_obtained'] / $row['total_marks']) * 100, 2) ?>%</td>
                <td><?= $co_string ?></td>
            </tr>
        <?php } ?>
    </table>

    <h3>CO Attainment Summary (Detailed)</h3>
    <table>
        <tr>
            <th>CO</th>
            <th>No. of Yes</th>
            <th>No. of No</th>
            <th>Avg %</th>
            <th>Final Attainment</th>
            <th>% Students > 40%</th>
            <th>Max %</th>
            <th>Min %</th>
            <th>Total Students</th>
            <th>All Attained?</th>
        </tr>
        <?php
        $overall_attainment_sum = 0;
        $overall_attainment_count = 0;

        foreach ($co_summary as $co => $counts) {
            $yes = $counts['Yes'];
            $no = $counts['No'];
            $total = $yes + $no;
            $avg = array_sum($co_percentages[$co]) / count($co_percentages[$co]);
            $final = ($avg >= 45) ? "Yes" : "No";
            $above_40 = $above_40_counts[$co];
            $above_40_percent = ($total > 0) ? round(($above_40 / $total) * 100, 2) : 0;
            $max = round($highest_attainment[$co], 2);
            $min = round($lowest_attainment[$co], 2);
            $fully_attained = ($yes === $total) ? "Yes" : "No";

            $overall_attainment_sum += $avg;
            $overall_attainment_count++;

            echo "<tr>
                    <td>$co</td>
                    <td>$yes</td>
                    <td>$no</td>
                    <td>" . round($avg, 2) . "%</td>
                    <td>$final</td>
                    <td>$above_40_percent%</td>
                    <td>$max%</td>
                    <td>$min%</td>
                    <td>$total</td>
                    <td>$fully_attained</td>
                </tr>";
        }

        $overall_avg_attainment = ($overall_attainment_count > 0)
            ? round($overall_attainment_sum / $overall_attainment_count, 2)
            : 0;
        ?>
    </table>

    <h4>Overall Average Attainment: <?= $overall_avg_attainment ?>%</h4>

    <br><a href="logout.php">Logout</a>
</body>
</html>

<?php $conn->close(); ?>
