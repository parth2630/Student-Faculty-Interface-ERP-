<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examination</title>
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

    .exam {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }

    .exam p {
      margin: 0;
    }

    .exam form {
      display: inline;
    }

    .exam input[type="submit"] {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
      cursor: pointer;
    }

    .exam input[type="submit"]:hover {
      background-color: #dc3545;
    }
  </style>
</head>
<body>
  <div class="container">
    
    <div class="quiz-history">
      <h3>Application details:-</h3>
      <?php
      session_start();
      include("login.php");
      $sql = "SELECT * FROM le_appl";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
          $count = 1;
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='exam'>";
              echo "<p><strong>Application $count:</strong> " . $row["text"] . "</p>";
              echo "<p><strong>Uploaded At:</strong> " . $row["uploaded at"] . "</p>";
              
              echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
              echo "<input type='hidden' name='text_id' value='" . $row["id"] . "'>";
              echo "</form>";
              echo "</div>";
              $count++;
          }
      } else {
          echo "No updates regarding exams.";
      }
      mysqli_close($con);
      ?>
    </div>
  </div>
</body>
</html>
