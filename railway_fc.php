<?php
    session_start();
    include("login.php");

    

    // Fetch concession details from the 'rail' table
    $concession_query = "SELECT * FROM rail";
    $concession_result = mysqli_query($con, $concession_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Railway Concession Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .concession-details {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="concession-details">
        <h1>Railway Concession Details</h1>
        <table>
            <tr>
                <th>XIE_ID</th>
                <th>Student Name</th>
                <th>From Station</th>
                <th>To Station</th>
                <th>Class Duration</th>
                <th>Class Type</th>
                <th>Date & Time</th>
            </tr>
            <?php
                if($concession_result && mysqli_num_rows($concession_result) > 0) {
                    while($row = mysqli_fetch_assoc($concession_result)) {
                        echo "<tr>";
                        echo "<td>".$row['xie_id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['from_station']."</td>";
                        echo "<td>".$row['to_station']."</td>";
                        echo "<td>".$row['class_duration']."</td>";
                        echo "<td>".$row['class_type']."</td>";
                        echo "<td>".$row['date_time']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No concession details found</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
