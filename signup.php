<?php
    session_start();
    include("login.php");
    
    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        $user=$_POST['username'];
        //$middlename=$_POST['mname'];
        $pass = $_POST['password'];

        if(!empty($user))
        {
            $query= "insert into mp (user,pass) values ('$user',' $pass')";
            mysqli_query($con, $query);
            echo "<script type= 'text/javascript'> alert ('Successfully updated')</script>";
        }
        else
        {
            echo "<script type= 'text/javascript'> alert ('Enter valid data!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deive-width,initial-scale=1">
        <title>SMART LOCK</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="signup">
            <h1>SIGN-UP</h1>
            <form method="POST">
                <label>username</label>
                <input type="numbers" name="username" required>
                <label>Password</label> 
                 <input type="password" name="password" required> 
                <input type="submit" name="" value="Submit"> 
            </form>
            <p>Already registered? <a href="login.php">Login here</a></p>
        
    </body>
</html>