<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "class_test_co");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['enrollment'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit_marks'])) {
    $enrollment = $_SESSION['enrollment'];
    $test_type = $_POST['test_type'];
    $co_count = $_POST['co_count'];

    $total_outof = 0;
    $total_obtained = 0;
    $co_data = [];

    for ($i = 1; $i <= $co_count; $i++) {
        $co_outof = intval($_POST["co{$i}_outof"]);
        $co_got = intval($_POST["co{$i}_got"]);

        $total_outof += $co_outof;
        $total_obtained += $co_got;

        $co_percentage = ($co_got / $co_outof) * 100;
        $attained = ($co_percentage >= 45) ? "Yes" : "No";

        $co_data[] = [
            'co' => "CO$i",
            'outof' => $co_outof,
            'got' => $co_got,
            'percentage' => round($co_percentage, 2),
            'attained' => $attained
        ];
    }

    $total_percentage = ($total_obtained / $total_outof) * 100;
    $co_json = json_encode($co_data); // Store CO data as JSON

    $sql = "INSERT INTO class_test (enrollment, test_type, co_count, total_marks, marks_obtained, co_details, total_percentage)
            VALUES ('$enrollment', '$test_type', '$co_count', '$total_outof', '$total_obtained', '$co_json', '$total_percentage')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>✅ Marks Saved Successfully!</h3>";
        echo "<a href='dashboard.php'>Go to Dashboard</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
