<?php
session_start();
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Requests</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      padding: 20px;
      text-align: center;
    }

    .box {
      width: 200px;
      height: 100px;
      background-color: #fff;
      border-radius: 10px;
      margin: 20px auto;
      padding: 20px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
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
.btn {
    background-color: green;
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


    .box img {
      width: 80px;
      height: 80px;
      margin-bottom: 10px;
    }

    .box h2 {
      color: #333;
      font-size: 18px;
      margin: 0;
    }
  </style>
  <script>
    function redirectTo(page) {
      window.location.href = page;
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="box" onclick="redirectTo('leave_fc.php')">
      <img src="leave.png" alt="leave">
      <h2>Leave</h2>
    </div>
    <div class="box" onclick="redirectTo('bonafide_fc.php')">
      <img src="resume.png" alt="Courses">
      <h2>Boanfide certificate</h2>
    </div>
    <div class="box" onclick="redirectTo('railway_fc.php')">
      <img src="train.png" alt="Courses">
      <h2>Railway concession</h2>
    </div>
    </div>
  </div>


  <script src="script.js"></script>
</body>
</html>
