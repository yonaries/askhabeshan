<?php
$_SESSION;
session_start();

    $servername='localhost';
    $serveruser='root';
    $serverpass='';
    $dbname='askhabeshan';

    $conn = mysqli_connect($servername,$serveruser,$serverpass,$dbname) or die("Connection Failed".mysqli_connect_error());

    if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $sql="INSERT INTO `users` SET   Username='$username',
                                        Email='$email',
                                        Password='$password'";  
        $excute = mysqli_query($conn,$sql);  
                                      
    }

?>