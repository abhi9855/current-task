<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "123456";*/
    error_reporting(E_ALL);

    $conn = mysqli_connect($servername="localhost", $username= "root", $password= "root1234",$dbname="liqroo");//$dbname="php"
    
    if ($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    } 
    // echo "Connected successfully";
?>

