<?php
include ('../config/connect.php');
include ('../config/header.php');
?>
<?php
$errmessage='';
    if(isset($_POST['submit'])){
        if(!empty($_POST['telphone'])){
            $phone=$_POST['telphone'];
            if(strlen($phone) == 13){
                $_SESSION['phonenumber']=$_POST['telphone'];
                header("location:../config/telda.php");
            }
            else{
                $errmessage='Invalid Number';
            }
        }
        else{
            $errmessage='Check your input please.';
        }
    }
    else if(isset($_POST['skip'])){
        header('location:Home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask Habeshan</title>
    <link rel="import" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/phone.css">
</head>
<body>
    <center>
        <div class="container">
            <div class="inner-container">
                <div class="card">
                    <div class="top">
                        <h6>Phone Number <br>Verification</h6>
                    </div>
                    <div class="low">
                        <div class="code"> <span>Your phone has to be registered In Ethiopia</span> <small></small> </div>
                        <form method="post">
                            <p style=" color:red"><?php echo $errmessage ?></p>
                            <div id="otp" class="inputs"> 
                                <input class="ph-input" name="telphone" type="tel" id="first" maxlength="13" value="+251" placeholder="enter your phone here."/> 
                            </div>
                            <div class="mt-4"><input name="submit" type="submit" value="Send Code" class="btn btn-danger px-4 validate"/> </div>
                            <div class="card-2">
                                <div class="content"> <span></span><button type="submit" name="skip">Skip</button> </div>
                            </div>
                        </form>
                    </div>
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