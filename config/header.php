<?php
   session_start();
   if($_SESSION['user']==false && $_SESSION['password']==false && $_SESSION['email']==false){
       header('location:login.php');
   }
?>