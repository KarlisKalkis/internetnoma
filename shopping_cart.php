<?php 
include 'config/connectionproducts.php';

// Prepare the SQL query to retrieve the renting point information
$sql = "SELECT * FROM rentingpoints WHERE ID_categories = '2'";

// Execute the SQL query
$result = $conn->query($sql);
?>

<?php
//check if product that has been input is right inputed
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Invalid renting point";
}
?>

<?php 
include 'productsheader.php';

?>



<script src="store.js" defer></script>



<body>

    <div class="container">
        <div class="row text-center py-5">
            
        </div>
    </div>
</body>