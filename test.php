<?php
include "config/connectionproducts.php";




// Get the product ID from the URL parameter
$product_id = $_GET['id'];

?>





<?php // Prepare the SQL query to retrieve the product information
$sql = "SELECT * FROM products WHERE id = '$product_id'"; ?>

<?php // Execute the SQL query
$result = $conn->query($sql);
?>
<?php
// Check if the query returned any results
if ($result->num_rows > 0) {
    // Output the product information
    $row = $result->fetch_assoc();
    echo "Product Name: " . $row["name"] . "<br>";
    echo "Product Description: " . $row["shortinfo"] . "<br>";
    echo "Product Price: $" . $row["price"] . "<br>";
} else {
    // Output an error message if the product ID is invalid
    echo "Invalid product ID";
}

// Close the database connection
$conn->close();
?>