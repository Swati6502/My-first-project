<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up/ Log in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- <h2>Log in/ Sign up Form</h2> -->
        <div class="container" id="container">

            <div class="form-container sign-up-container">

                <form action="register.php" method="post">
                    <h1>Create Account</h1>
                    <input type="text" name="username" required placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username=""; ?>">
                    <span class="invalid-feedback">
                        <?php echo $username_err="";?>
                    </span>
 
                    <!-- <input type="email" name="email" required placeholder="Email" class="form-control"> -->

                    <input type="password" name="password" required placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback">
                        <?php echo $password_err=""; ?>
                    </span>

                    <input type="password" name="confirm_password" required placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback">
                        <?php echo $confirm_password_err=""; ?>
                    </span>
                  
                    <button  type="submit" value="Submit">Sign Up</button>
                    <!-- <button  type="reset" value="Reset">Reset</button> -->

                </form>

            </div>

            <div class="form-container sign-in-container">
                <?php 
                $username_err ="";
                $password_err="";
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }        
                ?>
                <!-- <form action="validation.php" method="post"> -->
                <form action="login.php" method="post">
            
                    <h1>Log in</h1>
                    <input type="text" name="username" required placeholder="Username" class="form-control 
                    <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username=""; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>

                    <input type="password" name="password" required placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>

                    <a href="forgot-password.php">Forgot your password?</a>

                    <button type="submit" value="Login">Log In</button>
                </form>

            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Log In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>




        
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>


    
</body>
</html>