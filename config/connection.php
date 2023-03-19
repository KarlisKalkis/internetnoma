<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internetnoma";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the user information from the database
$user_id = 1; // Replace with the logged-in user's ID
$sql = "SELECT firstname, email FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $name = $row["firstname"];
    $email = $row["email"];
  }
} else {
  echo "No user found with ID $user_id";
}

// Close the database connection
mysqli_close($conn);
?>
