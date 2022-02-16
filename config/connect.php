<?php
    $servername='localhost';
    $serveruser='root';
    $serverpass='';
    $dbname='askhabeshan';

    $conn = new mysqli($servername,$serveruser,$serverpass,$dbname) or die("Connection Failed".mysqli_error($conn));
?>