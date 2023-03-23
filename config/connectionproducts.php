<?php 
$db_user="root";
$db_pass = "";
$db_name = "internetnoma";
$server_name = "localhost";


// Create a connection to the database
$conn = new mysqli($server_name, $db_user, $db_pass, $db_name);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>