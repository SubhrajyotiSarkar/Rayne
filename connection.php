<?php
    $host='localhost';
    $user='root';
    $pass='';
    $db='rayne';
    $conn=mysqli_connect($host,$user,$pass,$db);
    if(!$conn){
        echo die("connection failed" . mysqli_connect_error());
    }
    else{
        // echo "Database Connected";
    }
?>