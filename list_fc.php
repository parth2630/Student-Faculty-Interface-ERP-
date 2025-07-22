<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Selection</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      display: flex;
      flex-direction: column; /* Display boxes in a column */
      align-items: center; /* Center align the boxes horizontally */
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


    .box {
      width: 300px;
      height: 70px;
      background-color: #3498db;
      color: #fff;
      text-align: center;
      font-size: 18px;
      cursor: pointer;
      margin-bottom: 20px; /* Add margin between the boxes */
      transition: background-color 0.3s ease;
      display: flex;
      justify-content: center; /* Center align text horizontally */
      align-items: center; /* Center align text vertically */
    }

    .box:hover {
      background-color: #2980b9;
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
  <div class="container">
    <div class="box" onclick="redirectToPage('engineering_math')">Engineering Maths-IV</div>
    <div class="box" onclick="redirectToPage('os')">Operating Systems</div>
    <div class="box" onclick="redirectToPage('aoa')">Analysis Of Algorithm</div>
    <div class="box" onclick="redirectToPage('dbms')">Database Management System</div>
    <div class="box" onclick="redirectToPage('python')">Python</div>
    <div class="box" onclick="redirectToPage('microprocessor')">Microprocessor</div>
   
  </div>
  <!-- <center><button type="button" class="btn-student" onclick="redirectToLogoutPage()">LOGOUT</button></center> -->
  
  
  

  <script>
    function redirectToPage(course) {
      switch(course) {
        case 'engineering_math':
          window.location.href = 'math.php';
          break;
        case 'os':
          window.location.href = 'os.php';
          break;
        case 'aoa':
          window.location.href = 'aoa.php';
          break;
        case 'dbms':
          window.location.href = 'dbms.php';
          break;
        case 'python':
          window.location.href = 'python.php';
          break;
          case 'microprocessor':
          window.location.href = 'micro.php';
          break;
          
        default:
          break;
      }
    }
  </script>
</body>
</html>
