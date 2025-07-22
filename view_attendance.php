<?php
// Start session and include necessary files
session_start();
include("login.php");

// Get the XIE ID from the session
$xie_id = $_SESSION['username'];

// Query to fetch student's attendance from database
$query = "SELECT * FROM attendance WHERE xie_id = '$xie_id'";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Calculate attendance percentage and count attended and missed classes
    $total_classes = mysqli_num_rows($result);
    $attended_classes = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['status'] === 'Present') {
            $attended_classes++;
        }
    }
    $attendance_percentage = ($attended_classes / $total_classes) * 100;
    $missed_classes = $total_classes - $attended_classes;
} else {
    echo "Error: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <style>
        /* view_attendance.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .alert {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .defaulter {
            color: red;
        }

        .normal {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Attendance Summary</h2>
        <p>Total Classes: <?php echo $total_classes; ?></p>
        <p>Classes Attended: <?php echo $attended_classes; ?></p>
        <p>Classes Missed: <?php echo $missed_classes; ?></p>
        <p class="<?php echo ($attendance_percentage < 75) ? 'defaulter' : 'normal'; ?>">
            Attendance Percentage: <?php echo $attendance_percentage; ?>%
        </p>
        <?php if ($attendance_percentage < 75): ?>
            <p class="alert">Defaulter list alert!!</p>
        <?php endif; ?>
    </div>
</body>
</html>
