<?php
include ('../config/connect.php');
    session_start();
    $errormessage='';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE email='$email'AND password='$password'";
        $scan = mysqli_query($conn,$sql);

        if($scan ->num_rows > 0){
            $row = mysqli_fetch_assoc($scan);
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['user'] = $row['Username'];
                $_SESSION['currentuser_id'] = $row['user_id'];
                header('location:Home.php');
        } else{
            $errormessage = "Email or Password did not match!";
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ask Habeshan</title>
    <link rel="stylesheet" href="../css/auth.css" />
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form autocomplete="off" method="POST" class="signin-form">
                    <h2 class="title">Log In</h2>
                    <div class="error-message">
                        <p> <?php echo $errormessage ?> </p>
                    </div>
                    <div class="input-field">
                        <img src="../assets/icons/user.svg" alt="" class="form-icon" /><input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <img src="../assets/icons/lock.svg" alt="" class="form-icon" /><input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="login-btn">
                        <input type="submit" name="submit" value="Login" />
                    </div>
                    <br />
                    <p class="social-text">Or Login with</p>
                    <!-- <div class="social-media">
                        <a href="#" class="social-icons">
                            <img src="../assets/icons/facebook.svg" alt="" />
                        </a>
                        <a href="#" class="social-icons">
                            <img src="../assets/icons/twitter.svg" alt="" />
                        </a>
                        <a href="#" class="social-icons">
                            <img src="../assets/icons/instagram.svg" alt="" />
                        </a>
                    </div> -->
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="left-panel">
                <div class="content">
                    <h3>Don't have account?</h3>
                    <br /><br />
                    <p>
                        Join our site by signing up <br /> to ask your question.
                    </p>
                    <br />

                    <a href="signup.php">
                        <button class="signup-btn" id="sign-up-cta">Sign Up</button></a>
                </div>
            </div>
            <img src="../assets/illustrations/undraw_secure_login_pdn4.svg" alt="" />
        </div>
    </div>
</body>
<script>

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>