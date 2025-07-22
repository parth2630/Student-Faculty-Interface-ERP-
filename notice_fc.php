<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notices</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
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
    }

    textarea {
      width: 100%;
      height: 100px;
      margin-bottom: 10px;
      padding: 5px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .notice {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }

    .notice p {
      margin: 0;
    }

    .notice form {
      display: inline;
    }

    .notice input[type="submit"] {
      background-color: #f44336;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Notices</h2>
    <form method="post">
      <textarea name="notice" placeholder="Enter notice"></textarea>
      <input type="submit" value="Add Notice">
    </form>
    <div class="notice-history">
      <h3>Notice History</h3>
      <?php
session_start();
include("login.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['notice'])) {
    $notice = $_POST['notice'];
    
    if (!empty($notice)) {
        $query = "INSERT INTO notices (notice) VALUES ('$notice')";
        if (mysqli_query($con, $query)) {
            echo "<script type='text/javascript'>alert('Notice added successfully.');</script>";

            // Send email notification to all students
            $facultyName = "Faculty"; // Replace with actual faculty name
            $message = "$facultyName has uploaded a notice regarding: $notice";
            $subject = "New Notice Uploaded";

            // Fetch all student emails from the database
            $studentEmailsQuery = "SELECT email FROM stu_info";
            $result = mysqli_query($con, $studentEmailsQuery);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $to = filter_var($row['email'], FILTER_VALIDATE_EMAIL);

                    if ($to) {
                        // Create a new PHPMailer instance
                        $mail = new PHPMailer(true);
                        try {
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'lagishettyparth@gmail.com'; // Your Gmail address
                            $mail->Password   = 'qphfsymgssxlajeq';    // Your Gmail app password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port       = 587;

                            // Recipients
                            $mail->setFrom('lagishettyparth@gmail.com', 'PARTH');
                            $mail->addAddress($to);  // Add a recipientS

                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = $subject;
                            $mail->Body    = nl2br($message);

                            $mail->send();
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        echo "Invalid email address: {$row['email']}";
                    }
                }
                echo "<script type='text/javascript'>alert('Email notifications sent to all students.');</script>";
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "<script type='text/javascript'>alert('Please enter a valid notice.');</script>";
    }
}

$sql = "SELECT * FROM notices";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='notice'>";
        echo "<p><strong>$count:</strong>" . $row["notice"] . "</p>";
        echo "Uploaded At: " . $row["uploaded at"] . "<br>";
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<input type='hidden' name='notice_id' value='" . $row["id"] . "'>";
        echo "<input type='text' name='new_comment' placeholder='Enter new comment'>";
        echo "<input type='submit' name='edit_notice' value='Edit'>";
        echo "<input type='submit' name='delete_notice' value='Delete'>";
        echo "</form>";
        echo "</div>";
        $count++;
    }
} else {
    echo "No notices available.";
}

    // Check if edit button clicked
    if (!empty($_POST["edit_notice"])) {
      $notice_id = $_POST['notice_id'];
      $new_comment = $_POST["new_comment"];
      // Update comment in the database
      $sql = "UPDATE notices SET notice ='$new_comment' WHERE id='$notice_id'";
      if ($con->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Notice updated successfully.');</script>";
      } else {
          echo "Error updating comment: " . $con->error;
      }
  }

if (!empty($_POST["delete_notice"])) {
    $notice_id = $_POST["notice_id"];
    $sql = "DELETE FROM notices WHERE id='$notice_id'";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>alert('Notice deleted successfully.');</script>";
        header("Refresh:0");
    } else {
        echo "Error deleting notice: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
    
    </div>
  </div>
</body>
</html>
