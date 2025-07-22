<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application</title>
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
    <h2>Application For leave</h2>
    <form method="post">
      <textarea name="text" placeholder="Enter Application details"></textarea>
      <input type="submit" value="Submit">
    </form>
    <div class="text-history">
      <h3>Application History</h3>
      <?php
session_start();
include("login.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['text'])) {
    $text = $_POST['text'];
    $text = mysqli_real_escape_string($con, $_POST['text']);
    if (!empty($text)) {
        $query = "INSERT INTO le_appl (text) VALUES ('$text')";
        if (mysqli_query($con, $query)) {
            echo "<script type='text/javascript'>alert('Application added successfully.');</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "<script type='text/javascript'>alert('Please enter a valid application.');</script>";
    }
}

$sql = "SELECT * FROM le_appl";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='text'>";
        echo "<p><strong>$count:</strong>" . $row["text"] . "</p>";
        echo "Uploaded At: " . $row["uploaded at"] . "<br>";
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<input type='hidden' name='text_id' value='" . $row["id"] . "'>";
        echo "<input type='text' name='new_comment' placeholder='Enter new comment'>";
        echo "<input type='submit' name='edit_text' value='Edit'>";
        echo "<input type='submit' name='delete_text' value='Delete'>";
        echo "</form>";
        echo "</div>";
        $count++;
    }
} else {
    echo "No applications available.";
}

    // Check if edit button clicked
    if (!empty($_POST["edit_text"])) {
      $text_id = $_POST['text_id'];
      $new_comment = $_POST["new_comment"];
      // Update comment in the database
      $sql = "UPDATE le_appl SET text ='$new_comment' WHERE id='$text_id'";
      if ($con->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Exam notice updated successfully.');</script>";
      } else {
          echo "Error updating comment: " . $con->error;
      }
  }

if (!empty($_POST["delete_text"])) {
    $text_id = $_POST["text_id"];
    $sql = "DELETE FROM le_appl WHERE id='$text_id'";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>alert('Application deleted successfully.');</script>";
        header("Refresh:0");
    } else {
        echo "Error deleting application: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
    
    </div>
  </div>
</body>
</html>