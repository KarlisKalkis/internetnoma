<?php
session_start();
include 'config/connectionproducts.php';
include 'productsheader.php';
?>

<div class="container mt-5">
  <h2>Shopping Cart</h2>
  <hr>

  <?php


  if (isset($_SESSION['shopping_cart'])) {
    $shopping_cart = $_SESSION['shopping_cart'];
} else {
    $shopping_cart = array();
} 
 $shopping_cart = json_decode($_SESSION['shopping_cart'], true);

  if(empty($shopping_cart)) {
    echo "<p>Your shopping cart is empty.</p>";
  } else {
    foreach($shopping_cart as $cart_item) {

      // Retrieve the product information from the database
      $product_id = $cart_item['product_id'];
      $sql = "SELECT * FROM products WHERE id = '$product_id'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      // Calculate the rental duration
      $start_date = strtotime($cart_item['start_date']);
      $end_date = strtotime($cart_item['end_date']);
      $rental_duration = round(abs($end_date - $start_date) / (60 * 60 * 24));

      // Display the cart item information
      echo '<div class="row mt-4">';
      echo '<div class="col-md-6">';
      echo '<h4>' . $row['name'] . '</h4>';
      echo '<p>Price: ' . $row['price'] . ' EIRO a day</p>';
      echo '<p>Start Date: ' . $cart_item['start_date'] . '</p>';
      echo '<p>End Date: ' . $cart_item['end_date'] . '</p>';
      echo '<p>Rental Duration: ' . $rental_duration . ' day(s)</p>';
      echo '</div>';
      echo '</div>';
    }
  }
  ?>

  <div class="row mt-4">
    <div class="col-md-6">
      <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
    </div>
  </div>

</div>

<?php include 'mainpagestyles/footerindex.php' ?>

