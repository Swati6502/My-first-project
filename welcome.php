<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register_login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // include 'Main_project/index.html';
    header("location: index.html");

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; 
            text-align: center; 
	        background: #ed9fad3e;
            margin-top: 100px;
        }
        .btn {
            border-radius: 20px;
            border: 1px solid #ff416dac;
            background-color: #ff416dac;
            color: #FFFFFF;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 30px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            margin-top: 20px;
            cursor: pointer;
            margin: 10px;
            padding-top: 20px;

        }
        .btn-2{
            font-size: 20px;
            padding-top: 25px;
        }

        .btn:hover{
            color: #e96f85;
            color: #f74a6a;
            background-color: #f67c9277;
        }
        img{
            padding-top: 10px;
            width: 400px;
            border-radius: 20px;
        }

        h1{
            font-family: 'Monoton', cursive;
            color: #ec637c;
        }
    </style>
</head>
<body>
    <h1 class="my-4">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!! Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn ">Reset Your Password</a>
        <a href="logout.php" class="btn ">Sign Out of Your Account</a>
        <br>
        <!-- <a href="Main_project/index.php" class="btn ">Get started with the website</a> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
             <button type="submit" class="btn btn-2">Get started with the website
             <div>
                 <img src="images/Rect_logo.png">
             </div>

             </button> 
        </form>
    </p>

   
</body>
</html>