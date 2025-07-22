<?php
    session_start();
    include("login.php");

    // Fetch student details from the database based on session ID
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM stu_info WHERE xie_id = '$user'";
    $result = $con->query($sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $xie_id= $row['xie_id'];
        $department = $row['dept'];
        $contact = $row['student_contact'];
    }

    // Process form submission
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $from_station = $_POST['from_station'];
        $to_station = $_POST['to_station'];
        $class_duration = $_POST['class_duration'];
        $class_type = $_POST['class_type'];

        // Insert concession details into the 'rail' table
        $insert_query = "INSERT INTO rail (xie_id,name,from_station, to_station, class_duration, class_type, date_time) 
                         VALUES ('$xie_id','$name', '$from_station', '$to_station', '$class_duration', '$class_type', NOW())";
        mysqli_query($con, $insert_query);
        echo "<script>alert('Request Submitted');</script>";
    }

    // Delete concession record
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
        $delete_id = $_POST['delete_id'];
        $delete_query = "DELETE FROM rail WHERE id = '$delete_id' AND xie_id = '$user'";
        mysqli_query($con, $delete_query);
        echo "<script>alert('Request deleted');</script>";
    }

    // Fetch concession history of the student
    $concession_query = "SELECT * FROM rail WHERE xie_id = '$user'";
    $concession_result = mysqli_query($con, $concession_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Concession Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .concession-form {
            max-width: 600px;
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

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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

        td button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="concession-form">
        <h1>Railway Concession Form</h1>
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly>

            <label for="xie_id">XIE ID</label>
            <input type="text" id="xie_id" name="xie_id" value="<?php echo $xie_id; ?>" readonly>

            <label for="department">Department</label>
            <input type="text" id="department" name="department" value="<?php echo $department; ?>" readonly>

            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" readonly>

            <label for="from_station">From Station</label>
            <input type="text" id="from_station" name="from_station" placeholder="From Station" required>

            <label for="to_station">To Station</label>
            <input type="text" id="to_station" name="to_station" value="Mahim" readonly>

            <label for="class_duration">Class Duration</label>
            <select id="class_duration" name="class_duration" required>
                <option value="monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
            </select>

            <label for="class_type">Class Type</label>
            <select id="class_type" name="class_type" required>
                <option value="First_class">First Class</option>
                <option value="Second_class">Second Class</option>
            </select>

            <input type="submit" name="submit" value="Submit">
        </form>

        <h2>Concession History</h2>
        <table>
            <tr>
                <th>From Station</th>
                <th>To Station</th>
                <th>Class Duration</th>
                <th>Class Type</th>
                <th>Date & Time</th>
                <th>Action</th>
            </tr>
            <?php
                if($concession_result && mysqli_num_rows($concession_result) > 0) {
                    while($row = mysqli_fetch_assoc($concession_result)) {
                        echo "<tr>";
                        echo "<td>".$row['from_station']."</td>";
                        echo "<td>".$row['to_station']."</td>";
                        echo "<td>".$row['class_duration']."</td>";
                        echo "<td>".$row['class_type']."</td>";
                        echo "<td>".$row['date_time']."</td>";
                        echo "<td>";
                        // Form for delete button
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='delete_id' value='".$row['id']."'>";
                        echo "<input type='submit' name='delete' value='Delete'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>