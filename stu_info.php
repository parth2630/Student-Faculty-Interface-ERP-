<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Page</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 2100px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}

  </style>
</head>
<body>
  <div class="container">
    <h2>Student Details</h2>
    <table>
      <tr>
        <th>XIE ID</th>
        <th>SEM</th>
        <th>ROLL_NO</th>
        <th>NAME</th>
        <th>EMAIL ID</th>
        <th>DEPARTMENT</th>
        <th>STUDENT_CONTACT</th>
        <th>PARENTS_CONTACT</th>
        <th>DOB</th>
        <th>BLOOD GROUP</th>
        <th>CATEGORY</th>
      </tr>
      <?php
session_start();
// Include database connection
include('login.php');

// Fetch student details from the database
$query = "SELECT * FROM stu_info";
$result = mysqli_query($con, $query);

// Display student details in the table format
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['xie_id'] . "</td>";
        echo "<td>" . $row['sem'] . "</td>";
        echo "<td>" . $row['roll_no'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['dept'] . "</td>";
        echo "<td>" . $row['student_contact'] . "</td>";
        echo "<td>" . $row['parent_contact'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['bg'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No student records found.</td></tr>";
}

// Close database connection
mysqli_close($con);
?>
    </table>
  </div>
</body>
</html>


