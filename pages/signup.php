<?php
  session_start();
  
  include ('../config/connect.php');
  $errormessage='';
  if(isset($_POST['submit'])){
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['2password'])){
            $errormessage="All Required must be filled.";
    }//Check if there are inputs
    else if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['2password'])){
            if(isset($_POST['password']) == isset($_POST['2password'])){
                $checkuser=$_POST['username'];
                $checkemail=$_POST['email'];
                $getusername ="SELECT * FROM `users` where Username = '$checkuser'";
                $query=mysqli_query($conn,$getusername);
                $scan1 = mysqli_num_rows($query);
            if($scan1==0){
                $getuseremail = "SELECT * FROM `users` where Email = '$checkemail'";
                $query2=mysqli_query($conn,$getuseremail);
                $scan2 = mysqli_num_rows($query2);
                if($scan2==0){
                  $username=$_POST['username'];
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                
                  $sql="INSERT INTO `users` SET   Username='$username',
                                                    Email='$email',
                                                    Password='$password'";  
                    $excute = mysqli_query($conn,$sql); 
                
                    if($excute){
                      $getinfo ="SELECT * FROM `users` WHERE Email='$email' AND Password ='$password'";
                      $scan = mysqli_query($conn,$getinfo);
                      if($scan ->num_rows > 0){
                        $row = mysqli_fetch_assoc($scan);
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['user'] = $row['Username'];
                        $_SESSION['currentuser_id'] = $row['user_id'];
                        header('location:Home.php');
                      }
                    } 
                  }//Checks for taken emails
                  else{
                  $errormessage="email is used by another.";
                  } 
                }//Checks for taken usernames
                else{
                  $errormessage="username is taken, choose another.";
                  }
              }//Checks for Password Match
              else{
                  $errormessage="Password didn't Match";
                  }                        
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
    <link rel="stylesheet" href="../css/signup.css" />
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form autocomplete="off" method="POST" class="signup-form">
            <h2 class="title">Sign Up</h2>
            <div class="error-message">
                  <?php
                  echo $errormessage;
                  ?>
            </div>
            <div class="input-field">
              <img src="../assets/icons/user.svg" alt="" class="form-icon" />
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <img src="../assets/icons/email.svg" alt="" class="form-icon" />
              <input type="email" name="email" placeholder="Email address" />
            </div>
            <div class="input-field">
              <img src="../assets/icons/lock.svg" alt="" class="form-icon" />
              <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <img src="../assets/icons/lock.svg" alt="" class="form-icon" />
              <input type="password" name="2password" placeholder="Re-type Password" />
            </div>
            <br />
            <div class="signup-btn">
              <input type="submit" name="submit" value="Sign up" />
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="right-panel">
          <div class="content">
            <h3>
              Already <br />
              one of us?
            </h3>
            <br /><br />
            <p>
              Login again <br />
              and discover question.
            </p>
            <br />

            <a href="login.php">
              <button class="login-btn" id="sign-in-cta">Login</button></a
            >
          </div>
        </div>
      </div>
    </div>

  </body>
  <script>

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</html>
