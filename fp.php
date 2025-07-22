<?php  
    session_start();
    include("login.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        //$user = $_POST['username'];
        $user = $_SESSION['username'];
        $pass = $_POST['password'];

        if(!empty($user) && !empty($pass)) {
            // Check if the username exists in the database
            $query = "SELECT * FROM mp WHERE user = '$user' LIMIT 1";
            $result = mysqli_query($con, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                // Username exists, update the password
                $update_query = "UPDATE mp SET pass = '$pass' WHERE user = '$user'";
                if(mysqli_query($con, $update_query)) {
                    echo "<script>alert('Password updated successfully');</script>";
                    echo "<script>window.location.href = 'tab_stu.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('Error updating password');</script>";
                }
            } else {
                echo "<script>alert('Username not found');</script>";
            }
        } else {
            echo "<script>alert('Please fill in all fields');</script>";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset password</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .signup {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="numbers"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="signup">
        <h1>RESET PASSWORD</h1>
        <form method="POST">
            <!-- <label>Username</label>
            <input type="numbers" id="username" name="username" placeholder="XIE_ID"required> -->
            <label>New Password</label> 
            <input type="password" id="password" name="password" placeholder="Enter new password"required> 
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>
</body>
</html>
