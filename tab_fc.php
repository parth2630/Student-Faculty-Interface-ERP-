<?php
session_start();
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
  <script>
        function redirectToLogoutPage() {
            // Redirect to the student page
            window.location.href = "index1.php";
        }
        function redirectToChangePasswordPage(){
          window.location.href = "fp.php";
        }
    </script>
</head>
<body>
  <div class="container">
    <div class="box" onclick="redirectTo('profile_fc.php')">
      <img src="profile.png" alt="Profile">
      <h2>Profile</h2>
    </div>
    <div class="box" onclick="redirectTo('stu_info.php')">
      <img src="profile.png" alt="Profile">
      <h2>Students Profile</h2>
      </div>
    <div class="box" onclick="redirectTo('list_fc.php')">
      <img src="courses.png" alt="Courses">
      <h2>Courses</h2>
    </div>
    <div class="box" onclick="redirectTo('mark_attendance.php')">
      <img src="check.png" alt="Attendance">
      <h2>Mark Attendance</h2>
    </div>
    <div class="box" onclick="redirectTo('default.php')">
      <img src="check.png" alt="Attendance">
      <h2>View Attendance</h2>
    </div></h2>
    <div class="box" onclick="redirectTo('exam_fc.php')">
      <img src="exam.png" alt="Examination">
      <h2>Examination</h2>
    </div>
    <div class="box" onclick="redirectTo('notice_fc.php')">
      <img src="notice.png" alt="Notices">
      <h2>Notices</h2>
    </div>
    <div class="box" onclick="redirectTo('bg.php')">
      <img src="timetable.png" alt="Timetable">
      <h2>Timetable</h2>
    </div>
    <div class="box" onclick="redirectTo('quiz_fc.php')">
      <img src="quiz.png" alt="Quiz">
      <h2>Quiz</h2>
    </div>
    <div class="box" onclick="redirectTo('apply_fc.php')">
      <img src="apply.png" alt="Quiz">
      <h2>Application Requests</h2>
  </div>
  <center><button type="button" class="btn" onclick="redirectToChangePasswordPage()">Change Password</button></center>
  <center><button type="button" class="btn-student" onclick="redirectToLogoutPage()">LOGOUT</button></center>

  <script src="script.js"></script>
</body>
</html>
