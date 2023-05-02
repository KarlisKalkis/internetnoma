<?php 

include 'config/connectionproducts.php';
include 'add_to_cart.php';
include 'productsheader.php';

$product_id = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['product_id'])) {
    $product_id = $_POST['product_id'];
}


// Prepare the SQL query to retrieve the product information
$sql = "SELECT * FROM products WHERE id = '$product_id'";

$products = array(
    array('$row[ID]', '$row[ID_Categorie]', '$row[price]' ),
);