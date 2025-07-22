<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>
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

    .quiz {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }

    .quiz p {
      margin: 0;
    }

    .quiz form {
      display: inline;
    }

    .quiz input[type="submit"] {
      background-color: #f44336;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Quiz</h2>
    <form method="post">
      <textarea name="quiz" placeholder="Enter Quiz details"></textarea>
      <input type="submit" value="Add Quiz">
    </form>
    <div class="quiz-history">
      <h3>Quiz History</h3>
      <?php
session_start();
include("login.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['quiz'])) {
    $quiz = $_POST['quiz'];
    
    if (!empty($quiz)) {
        $query = "INSERT INTO quiz (quiz) VALUES ('$quiz')";
        if (mysqli_query($con, $query)) {
            echo "<script type='text/javascript'>alert('Quiz submitted successfully.');</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "<script type='text/javascript'>alert('Error occurred, try again in a while.');</script>";
    }
}

$sql = "SELECT * FROM quiz";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        
        echo "<div class='quiz'>";
        echo "<p><strong>$count:</strong>" . $row["quiz"] . "</p>";
        echo "Uploaded At: " . $row["uploaded at"] . "<br>";
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<input type='hidden' name='quiz_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='delete_quiz' value='Delete'>";
        echo "</form>";
        echo "</div>";
        $count++;
    }
} else {
    echo "No quiz uploaded.";
}

if (!empty($_POST["delete_quiz"])) {
    $quiz_id = $_POST["quiz_id"];
    $sql = "DELETE FROM quiz WHERE id='$quiz_id'";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>alert('Quiz deleted successfully.');</script>";
        header("Refresh:0"); // Refresh the page to reflect changes
    } else {
        echo "Error deleting quiz: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

    
    </div>
  </div>
</body>
</html>
