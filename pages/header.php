<?php
    include('../pages/servers.php');

    if(!isset($_SESSION['users'])){
        
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login First</div>";
        header('location:'.SITEURL. 'login.php');
    }
?>