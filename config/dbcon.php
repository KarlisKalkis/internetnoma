<?php

    $host="localhost";
    $username="root";
    $password = "";
    $database = "internetnoma";
    
    //Creating data base connection
    $con = mysqli_connect($host, $username, $password, $database);


    //Check database connection
    if(!$con)
    {
        die("connection failed: ". mysqli_connect_error());
    }
    else{
        echo "connected sucessfully";
    }
?>