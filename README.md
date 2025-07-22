# Student & Faculty Portal

This project is a web-based portal for students and faculty to manage attendance, courses, profiles, and various academic requests. It is built using PHP and MySQL, with a simple and intuitive interface for both user types.

## Features

### For Students
- **Login/Logout**: Secure authentication using XIE ID and password.
- **Profile Management**: View and update personal profile information.
- **Course List**: View enrolled courses.
- **Attendance**: View attendance records.
- **Bonafide/Exam/Leave/Railway Applications**: Apply for various certificates and permissions online.
- **Quiz & Exam**: Access quizzes and exam information.
- **Notices**: View important notices from faculty.
- **Password Reset**: Forgot password and reset functionality.

### For Faculty
- **Login/Logout**: Secure authentication for faculty members.
- **Profile Management**: View and update faculty profile.
- **Student Profiles**: Access student information and profiles.
- **Course Management**: View and manage courses.
- **Attendance Management**: Mark and view student attendance.
- **Bonafide/Exam/Leave/Railway Applications**: Approve or review student applications.
- **Quiz & Exam Management**: Create and manage quizzes and exams.
- **Notices**: Post important notices for students.

## Project Structure
- `index1.html`: Landing page for role selection (Student/Faculty).
- `index.php`: Student login page.
- `fc.php`: Faculty login page.
- `tab_stu.php`: Student dashboard.
- `tab_fc.php`: Faculty dashboard.
- `profile_stu.php`, `profile_fc.php`: Profile pages.
- `list_stu.php`, `list_fc.php`: Course lists.
- `view_attendance.php`, `mark_attendance.php`: Attendance features.
- `bonafide.php`, `exam_stu.php`, `leave.php`, `railway.php`, etc.: Student application forms.
- `bonafide_fc.php`, `exam_fc.php`, `leave_fc.php`, `railway_fc.php`, etc.: Faculty review pages.
- `PHPMailer/`: Email functionality for password reset and notifications.
- `log.sql`: Database schema and sample data.

## Database Setup
1. Create a MySQL database named `log`.
2. Import the `log.sql` file to set up tables and sample data:
   ```
   mysql -u root -p log < log.sql
   ```
3. Update database credentials in `login.php` if needed:
   ```php
   $con = mysqli_connect("localhost", "root", "", "log") or die(mysqli_error());
   ```

## Requirements
- PHP 7.x or later
- MySQL/MariaDB
- Web server (e.g., Apache, XAMPP)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer) (included)

## Running the Project
1. Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
2. Start Apache and MySQL from your XAMPP control panel.
3. Access the portal in your browser:
   - Student: `http://localhost/sem4/index1.html` → Student Login
   - Faculty: `http://localhost/sem4/index1.html` → Faculty Login

## Screenshots
- Login, dashboard, and application forms are included in the project as HTML/PHP files.

## Customization
- Update styles in `index.css`, `index1.css`, or inline `<style>` tags as needed.
- Add/modify features by editing the corresponding PHP files.

## License
This project is for educational purposes. PHPMailer is included under its own [license](PHPMailer/LICENSE). 