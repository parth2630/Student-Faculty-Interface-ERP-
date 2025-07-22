<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

form {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="file"], textarea, input[type="submit"] {
    display: block;
    margin-bottom: 10px;
    width: 20%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.btn-student {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 10px;
    cursor: pointer;
}

.btn-student:hover {
    background-color: #d32f2f;
}

    </style>
    <script>
        function redirectToLogoutPage() {
            // Redirect to the student page
            window.location.href = "index1.php";
        }
    </script>
</head>
<body>
    <h2>Upload a File</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <textarea name="comment" placeholder="Add comment"></textarea>
        <input type="submit" name="submit" value="Upload File">
        <button type="button" class="btn-student" onclick="redirectToLogoutPage()">LOGOUT</button>
    </form>
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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if a file was selected for upload
    if (!empty($_FILES["file"]["name"])) {
        $targetDir = "uploads/"; // Directory where files will be stored
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow only certain file formats
        $allowedFormats = array("jpg", "jpeg", "gif", "pdf", "png", "doc", "docx");

        if (!in_array($fileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, and DOCX files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                // Store file metadata in the database
                $fileName = basename($_FILES["file"]["name"]);
                $fileSize = $_FILES["file"]["size"];
                $fileType = $_FILES["file"]["type"];
               

                $sql = "INSERT INTO stu_info (photo,photo_path) VALUES ('$fileName','$targetFile')";
                if ($con->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert('The file has been uploaded and stored in the database.');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
            }
            $sql = "UPDATE stu_info SET photo='$fileName' WHERE id='202204030'";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please select a file to upload.');</script>";
    }
}


$con->close();
?>

