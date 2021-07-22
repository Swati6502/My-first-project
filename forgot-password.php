<?php
// Initialize the session
session_start();
 
// Include config file
require_once "error.php";

// require "PHPMailer/PHPMailerAutoload.php";
// require("PHPMailer/PHPMailerAutoload.php");


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$sql = "SELECT * FROM `users` WHERE username = '$username'";
	$res = mysqli_query($link, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		// echo "Email sent to the user with password";

        $r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";

		$message = "Please use this link to reset password: $password" ;
		$headers = "From : vivek@codingcyber.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}

	}
    else{
		echo "User name does not exist in database";
	}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    
    <style>
        body{ 
            font-size: 14px; 
            font-family: 'Montserrat', sans-serif;
        }
        #formbox{
            max-height: 340px;
            padding: 50px 60px;
            border-radius: 20px;
        }
        .wrapper{ width: 360px; padding: 20px; }

    </style>
</head>
<body>
    <!-- <div class="container_reset" > -->
    <!-- <div class="form_container_reset">  -->
        <!-- <p>Please fill out this form to reset your password.</p> -->
        
            <form id="formbox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <h1 > Forgot Password?</h1>
                <h4> Get reset link on your email</h4>
                
                <br>
                
                    <!-- <label>Email</label> -->
                    <input type="text" name="username" placeholder="Username">
                    <!-- <input type="email" name="email" placeholder="Email"> -->

           
                    <button type="submit" class="btn btn-primary" value="Submit">Send</button>

            </form>
        </div>
    </div>    
</body>
</html>