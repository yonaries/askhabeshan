<?php
    session_start();

    $servername='localhost';
    $serveruser='root';
    $serverpass='';
    $dbname='askhabeshan';

    $conn = new mysqli($servername,$serveruser,$serverpass,$dbname) or die("Connection Failed".mysqli_error($conn));
    //$db_select = mysqli_select_db($conn,$dbname) or ;
?>