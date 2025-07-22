<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    // Load PHPMailer classes
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    

    session_start();
    include("login.php");

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $user = $_POST['username'];

        if(!empty($user)) {
            // Check if the username exists in the database
            $query = "SELECT * FROM stu_info WHERE xie_id = '$user' LIMIT 1";
            $result = mysqli_query($con, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                // Username exists, fetch email address
                $row = mysqli_fetch_assoc($result);
                $email = $row['email']; // Get the email from stu_info table
                $_SESSION['username'] = $user;
                
                // Generate OTP
                $otp = mt_rand(100000, 999999);

                // Send OTP to the user's email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lagishettyparth@gmail.com'; // Your Gmail address
                    $mail->Password   = 'qphfsymgssxlajeq';        // Your Gmail password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    // Recipients
                    $mail->setFrom('lagishettyparth@gmail.com', 'PARTH');
                    $mail->addAddress($email);  // Add a recipient

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset OTP';
                    $mail->Body    = 'Your OTP is: ' . $otp;

                    $mail->send();
                    // Store OTP in session
                    $_SESSION['otp'] = $otp;
                    $_SESSION['user'] = $user;
                    echo "OTP sent!";
                    // Redirect to OTP verification page
                    header("Location: otp.php");
                    exit;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
            <label>Username</label>
            <input type="numbers" id="username" name="username" placeholder="XIE_ID"required> 
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>
</body>
</html>
