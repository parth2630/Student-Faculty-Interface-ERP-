<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $user = $_SESSION['username'];
        $otp_entered = $_POST['otp'];

        if(!empty($otp_entered)) {
            // Check if the entered OTP matches the stored OTP in the session
            if(isset($_SESSION['otp']) && $otp_entered == $_SESSION['otp']) {
                // OTP is correct, redirect to the next page
                $_SESSION['username'] = $user;
                header("Location: set.php");
                exit;
            } else {
                echo "<script>alert('Invalid OTP');</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <label>Enter OTP</label>
            <input type="numbers" id="otp" name="otp" placeholder="OTP" required> 
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>
</body>
</html>
