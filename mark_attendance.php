<?php
// Start session and include necessary files
session_start();
include("login.php");

// Fetch faculty name using session ID
$user = $_SESSION['username'];
$query_faculty_name = "SELECT name FROM fac_info WHERE xie_id = '$user'";
$result_faculty_name = mysqli_query($con, $query_faculty_name);

// Check if the query result contains any rows
if ($result_faculty_name && mysqli_num_rows($result_faculty_name) > 0) {
    $row_faculty_name = mysqli_fetch_assoc($result_faculty_name);
    $faculty_name = $row_faculty_name['name'];
} else {
    // Handle the case where no faculty name is found
    $faculty_name = "Faculty Name Not Found";
}

$query_subject_name = "SELECT subject FROM fac_info WHERE xie_id = '$user'";
$result_subject_name = mysqli_query($con, $query_subject_name);

// Check if the query result contains any rows
if ($result_subject_name && mysqli_num_rows($result_subject_name) > 0) {
    $row_subject_name = mysqli_fetch_assoc($result_subject_name);
    $subject_name = $row_subject_name['subject'];
} else {
    // Handle the case where no faculty name is found
    $subject_name = "Faculty Name Not Found";
}


// Handle attendance submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process attendance form submission
    if(isset($_POST['attendance'])) {
        $attendance_data = $_POST['attendance'];
        //$subject = $_POST['subject'];
        $from_time = $_POST['from'];
        $to_time =  $_POST['to'];
        $current_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
        
        // Query to fetch all students' XIE IDs
        $query_all_students = "SELECT xie_id FROM stu_info";
        $result_all_students = mysqli_query($con, $query_all_students);
        $all_students_xie_ids = array();
        while ($row_student = mysqli_fetch_assoc($result_all_students)) {
            $all_students_xie_ids[] = $row_student['xie_id'];
        }
        
        // Loop through all students and mark absent if not selected in the form
        foreach($all_students_xie_ids as $xie_id) {
            $status = isset($attendance_data[$xie_id]) ? mysqli_real_escape_string($con, $attendance_data[$xie_id]) : 'absent';
            
            // Update the attendance table with the new status and current date
            $update_query = "INSERT INTO attendance (faculty_name, subject, from_time, to_time, xie_id, status, date) 
                             VALUES ('$faculty_name', '$subject_name', '$from_time', '$to_time', '$xie_id', '$status', '$current_date')";
            $result = mysqli_query($con, $update_query);
            
            if(!$result) {
                // Handle database update error
                echo "Error updating attendance for XIE ID: $xie_id";
            }
        }
    }
}

// Query to fetch students for marking attendance
$query = "SELECT xie_id, roll_no, name FROM stu_info";
$result = mysqli_query($con, $query);

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mark Attendance</title>
        <style>
            /* mark_attendance.css */
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
            form {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            input[type="checkbox"] {
                margin-right: 5px;
            }
            input[type="submit"] {
                display: block;
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; 
    margin-bottom: 10px;
}
select option {
    padding: 5px;
}
#selectAll {
    margin-bottom: 10px;
}

        </style>
    </head>
    <body>
        <h2>Mark Attendance</h2>
        <form id="attendanceForm" method="POST">
            <h4><div>Faculty Name: <?php echo $faculty_name; ?></div></h4>
            <h4><div>Subject: <?php echo $subject_name; ?></div></h4>
            <br>
            <label for="from">From:</label>
            <select name="from" id="from">
                <option value="10:45">SELECT</option>
                <option value="8:45">8:45</option>
                <option value="9:45">9:45</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="01:30">01:30</option>
                <option value="02:30">02:30</option>
                <option value="03:30">03:30</option>
            </select>
            <br>
            <label for="to">To:</label>
            <select name="to" id="to">
                <option value="10:45">SELECT</option>
                <option value="9:45">9:45</option>
                <option value="10:45">10:45</option>
                <option value="12:00">12:00</option>
                <option value="01:00">01:00</option>
                <option value="02:30">02:30</option>
                <option value="03:30">03:30</option>
                <option value="04:30">04:30</option>
            </select>
            <br>
            <input type="checkbox" id="selectAll"> <label for="selectAll">Select All</label>
            <br>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <input type="checkbox" name="attendance[<?php echo $row['xie_id']; ?>]" value="present">
                <label><?php echo $row['xie_id'] . ' - ' . $row['roll_no'] . ' - ' . $row['name']; ?></label><br>
            <?php endwhile; ?>
            <input type="submit" value="Submit Attendance">
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Get the "Select All" checkbox and all other checkboxes
                var selectAllCheckbox = document.getElementById('selectAll');
                var checkboxes = document.querySelectorAll('input[type="checkbox"][name^="attendance"]');

                // Add an event listener to the "Select All" checkbox
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });
            });
        </script>
    </body>
    </html>
