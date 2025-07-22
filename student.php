
<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <style>
/* Add this CSS to style your student page */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

#fileList {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.file-item {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.file-item h3 {
    margin-top: 0;
    color: #333;
}

.file-info {
    margin-top: 10px;
    color: #666;
}

.file-info a {
    color: #007bff;
    text-decoration: none;
}

.file-info a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h2>STUDENT</h2>
    <div id="fileList">
        Files uploaded by faculty will be displayed here:-
    </div><br>

    <!-- <script> 
        $(document).ready(function(){
            // Function to fetch and display files uploaded by faculty
            function fetchFiles() {
                $.ajax({
                    url: 'fetch_files.php', // PHP script to fetch files from the database
                    type: 'GET',
                    success: function(response) {
                        $('#fileList').html(response); // Update the fileList div with fetched data
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the fetchFiles function initially to display files on page load
            fetchFiles();

            // Set interval to fetch files every 5 seconds (you can adjust the interval as needed)
            setInterval(fetchFiles, 5000);
        });
    </script> -->
</body>
</html>

<?php
session_start();
include("login.php");

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "log";

$conn = new mysqli("localhost", "root", "", "log");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve files uploaded by faculty
$sql = "SELECT * FROM maths";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "File Name: " . $row["name"] . "<br>";
        echo "Comments:" .$row["comment"] . "<br>";
        echo "Uploaded At: " . $row["uploaded at"] . "<br>";
        
        echo "<a href='" . $row["path"] . "' target='_blank'>Download</a><br><br>";
    }
} else {
    echo "No files uploaded by faculty.";
}

$conn->close();
?>
