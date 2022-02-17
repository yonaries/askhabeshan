<?
include('../config/connect.php');
include('../config/telda.php');
include('../pages/signup.php');
?>
<?php
session_start();
$errmessage='';
echo $_SESSION['otpcode'];

if(isset($_POST['submit'])){
    if(!empty($_POST['code1']) && !empty($_POST['code2']) && !empty($_POST['code3']) && !empty($_POST['code4'])){
        $userotpcode=$_POST['code1'].$_POST['code2'].$_POST['code3'].$_POST['code4'];
        if($_SESSION['otpcode']==$userotpcode){
            header('location:../config/emailotp.php');
        }
        else{
            $errmessage="Invalid Code";
        }
    }
    else{
        $errmessage="Invalid Code";
    }
}
?>
<?php 
    function partiallyHideEmail($email)
    {
      // use FILTER_VALIDATE_EMAIL filter to validate an email address
      if(filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        // split an email by "@"
        list($first, $last) = explode("@", $email);
    
        // get half the length of the first part
        $len = floor(strlen($first)/2);
    
        // partially hide a string by "*" and return full string
        return substr($first, 0, $len) . str_repeat('*', $len) . "@" . $last;
      }
    }   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Phone Number</title>
    <link rel="import" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/verify.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <Script>
        $(document).ready(function(){
            $(".m-2").keyup(function () {
                $this=$(this);
                if ($this.val().length >=$this.data("maxlength")) {
                  if($this.val().length>$this.data("maxlength")){
                    $this.val($this.val().substring(0,4));
                  }
                  $this.next(".m-2").focus();
                }
             });
        });
    </Script>
</head>
<body>
    <center>
        <div class="container">
            <div class="inner-container">
                <div class="card">
                    <form method="post">
                    <h6>Verify Your Email</h6>
                    <p >
                        <?php echo $errmessage; ?>
                    </p>
                    <div class="code"> <span>A code has been sent to </span><br> <small><?php echo $_SESSION['phonenumber']; ?></small> </div>
                    <div class="low">
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                            <input name="code1" class="m-2 text-center form-control rounded" type="text" id="first" data-maxlength="1" maxlength="1" /> 
                            <input name="code2" class="m-2 text-center form-control rounded" type="text" id="second" data-maxlength="1" maxlength="1"/> 
                            <input name="code3" class="m-2 text-center form-control rounded" type="text" id="third" data-maxlength="1" maxlength="1"/> 
                            <input name="code4" class="m-2 text-center form-control rounded" type="text" id="fourth" data-maxlength="1" maxlength="1"/> 
                        </div>
                    </div>
                    <div class="mt-4"> <button type="submit" name="submit" class="btn btn-danger px-4 validate">Verify</button> </div>
                    <div class="card-2">
                        <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the code? </span> <a href="../config/telda.php" class="text-decoration-none ms-3">Resend</a> <br><br><a href="../pages/Home.php" class="text-decoration-none ms-3">Skip</a> </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>