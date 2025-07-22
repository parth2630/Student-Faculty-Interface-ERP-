<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include('login.php');
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "log";

        // Create connection
        $conn = new mysqli("localhost", "root", "", "log");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the username from the session
        $user = $_SESSION['username'];

        // Fetch the user's profile information from the database
        $sql = "SELECT * FROM stu_info WHERE xie_id = '$user'";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            // Display the user's profile information
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container'>";
                echo "<h2>Welcome, " . $row["name"] . "!</h2>";
                echo "<p>Bachelor of Engineering</p>";
                echo "<p>TE-A (COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY, IOT, BLOCKCHAIN Technology))</p>";
                echo "<img src='" . $row['photo_path'] . "' style='max-width: 200px;'>";

                echo "<p>XIE ID: " . $row["xie_id"] . "</p>";
                echo "<p>SEM: " . $row["sem"] . "</p>";
                echo "<p>ROLL NO: " . $row["roll_no"] . "</p>";
                echo "<p>NAME: " . $row["name"] . "</p>";
                echo "<p>DEPARTMENT: " . $row["dept"] . "</p>";
                echo "<p>EMAIL: " . $row["email"] . "</p>";
                echo "<p>DOB: " . $row["dob"] . "</p>";
                echo "<p>BLOOD GROUP: " . $row["bg"] . "</p>";
                echo "<p>CATEGORY: " . $row["category"] . "</p>";
                echo "<p>STUDENT CONTACT: " . $row["student_contact"] . "</p>";
                echo "<p>PARENT CONTACT: " . $row["parent_contact"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No profile found for this user.";
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
