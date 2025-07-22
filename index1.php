<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="index1.css">
  <script src="index1.js"></script>
  <style>
.btn-student,
.btn-faculty {
  padding: 10px 20px;
  margin: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  color: #fff;
  background-color: #007bff; /* blue color */
  transition: background-color 0.3s ease;
}

.btn-student:hover,
.btn-faculty:hover {
  background-color: #0056b3; /* darker blue color on hover */
}
  </style>
  
</head>
<body>
<!-- .container(onclick) 
  .top
  .bottom
  .center
    h2 Please Sign In
    input(type="email" placeholder="email")
    input(type="password" placeholder="password")
    h2 -->
    <div class="container" onclick="onclick">
      <div class="top"></div>
      <div class="bottom"></div>
      <div class="center">
          <br><br>
          <!-- <div class="box" > -->
            <h2>LOGIN AS</h2>
            <button type="button" class="btn-student" onclick="redirectToStudentPage()">STUDENT</button>
            <br>
            <button type="button" class="btn-faculty" onclick="redirectToFacultyPage()">FACULTY</button>

          <!-- </div> -->

</body>
</html>