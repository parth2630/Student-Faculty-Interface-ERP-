<?php
// Start session and include necessary files
session_start();
include("login.php");

// Load PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Initialize the students array
$students = [];

// Fetch all students' information
$query = "SELECT xie_id, roll_no, name, email FROM stu_info";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($con);
    exit;
}

// Handle the email sending logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['name'])) {
    // Get email and name from the POST request
    $email = $_POST['email'];
    $name = $_POST['name'];

    // Set the email subject and message
    $subject = "Defaulter Alert";
    $message = "Dear $name,\n\nYou are in the defaulter list for this semester. Please ensure to attend the classes regularly.\n\nBest Regards,\nCSE department";

    // Send the email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lagishettyparth@gmail.com'; // Your Gmail address
        $mail->Password = 'qphfsymgssxlajeq'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('lagishettyparth@gmail.com', 'PARTH');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);

        $mail->send();
        echo "Email sent successfully to $name.";
    } catch (Exception $e) {
        echo "Failed to send email to $name. Mailer Error: {$mail->ErrorInfo}";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .defaulter {
            color: red;
        }

        .normal {
            color: green;
        }

        .btn-download {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-download:hover {
            background-color: #45a049;
        }

        .btn-email {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-email:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container" id="attendance-report">
        <h2>Students Attendance</h2>
        <table>
            <tr>
                <th>XIE ID</th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Attendance Percentage</th>
                <th>Email Notification</th>
            </tr>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $student): ?>
                    <?php
                    // Fetch attendance for each student
                    $xie_id = $student['xie_id'];
                    $attendance_query = "SELECT status FROM attendance WHERE xie_id = '$xie_id'";
                    $attendance_result = mysqli_query($con, $attendance_query);
                    
                    if ($attendance_result) {
                        $total_classes = mysqli_num_rows($attendance_result);
                        $attended_classes = 0;
                        while ($row = mysqli_fetch_assoc($attendance_result)) {
                            if ($row['status'] === 'Present') {
                                $attended_classes++;
                            }
                        }
                        $attendance_percentage = ($total_classes > 0) ? ($attended_classes / $total_classes) * 100 : 0;
                    } else {
                        $attendance_percentage = 0;
                    }
                    ?>
                    <tr>
                        <td><?php echo $student['xie_id']; ?></td>
                        <td><?php echo $student['roll_no']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td class="<?php echo ($attendance_percentage < 75) ? 'defaulter' : 'normal'; ?>">
                            <?php echo number_format($attendance_percentage, 2); ?>%
                        </td>
                        <td>
                            <?php if ($attendance_percentage < 75): ?>
                                <button class="btn-email" onclick="sendEmail('<?php echo $student['email']; ?>', '<?php echo $student['name']; ?>')">Send Email</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <button class="btn-download" onclick="downloadPDF()">Download as PDF</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('attendance-report');
            html2pdf(element, {
                margin: 1,
                filename: 'attendance_report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            });
        }

        function sendEmail(email, name) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    alert(this.responseText);
                }
            }
            xhr.send("email=" + email + "&name=" + name);
        }
    </script>
</body>
</html>
