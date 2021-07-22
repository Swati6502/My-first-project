<?php
// Initialize the session
session_start();
 
error_reporting(0);
// Include config file
require_once "error.php";

$email= $_POST["email"];
$username= $_POST["username"];

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Define variables and initialize with empty values

    $s = "select * from users where username = '$username'";
    mysqli_query($link, $s);
    $result = mysqli_query($link, $s);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $reg= "UPDATE users SET email ='$email' where username = '$username'";
        mysqli_query($link, $reg);
        header("location: register_login.php");
    }
    else{
        echo "Oops! No such username. Please try again later.";
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
            max-height: 350px;
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
                <h1 > Add Email</h1>
                <br>
                
                    <!-- <label>Email</label> -->
                    <input type="text" name="username" placeholder="Username">
                    <input type="email" name="email" placeholder="Email">

           
                    <button type="submit" class="btn btn-primary" value="Submit">Add Email</button>

            </form>
        </div>
    </div>    
</body>
</html>