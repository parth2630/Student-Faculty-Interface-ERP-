<?php  
    session_start();
    include("login.php");
    
    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if(!empty($user) && !empty($pass))
        {
            $query= "select * from mp where user = '$user' limit 1";
            $result = mysqli_query($con, $query);
            
            if ($result)
            {
               if ($result && mysqli_num_rows($result) > 0)
               {
                 $user_data = mysqli_fetch_assoc($result);
                 if ($user_data['user']== $user && $user_data['pass']==$pass)
                 {
					$_SESSION['username'] = $user;
                    header("location: tab_stu.php");
                    die;
                 }
               }
            }
            echo "<script type= 'text/javascript'> alert ('Enter valid credentials!!')</script>";
        }
        else{
            echo "<script type= 'text/javascript'> alert ('Please Contact College Admin!!')</script>"; 
        }
        
    }
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="index.css">
	 <script> 
		document.addEventListener("DOMContentLoaded", function() {
			var loginForm = document.querySelector('.login');
			var passwordInput = document.querySelector('.login__input[type="password"]');
			var xieIDInput = document.querySelector('.login__input[type="numbers"]');

			loginForm.addEventListener('submit', function(event) {
				event.preventDefault();

				var passwordValue = passwordInput.value.trim();
				var xieIDValue = xieIDInput.value.trim();

				if (xieIDValue === "") {
					alert("Please enter your XIE ID.");
					return;
				} else if (isNaN(xieIDValue)) {
					alert("XIE ID should contain only numbers.");
					return;
				} else if (xieIDValue.length !== 9) {
					alert("Enter valid XIE ID");
					return;
				}

			});
		});
	</script>
	</head>
<body>
	<form method="POST">

<div class="container">
	
	<div class="screen">
		<div class="screen__content">
			<form class="login">
				<div class="login__field">
					<h3>STUDENT LOGIN</h3>
					<br> 
					<i class="login__icon fas fa-user"></i>
					<input type="numbers" class="login__input" id="username" name="username" placeholder="XIE ID">

				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" id="password" name="password" placeholder="Password">
				</div>
				<button class="button login__submit">
					<span class="submit">Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
					<!-- <input type="submit" name="" value="Submit"> -->
				</button>	
				<!-- <form class="login" action="login.php" method="post"></form>			 -->
			</form> 
			<br>
			<p><a href="forgot.php">Forgot Password?</a></p>

			<!--<div class="social-login">
				<h3>log in via</h3>
				 <div class="social-icons"> 
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div> -->
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>



</body>
</html>