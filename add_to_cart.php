<?php

// check if the 'add to cart' button has been submitted
if (isset($_POST['add-to-cart'])) {

    // check if the cart session variable exists
    if (!isset($_SESSION['cart'])) {
        // if not, initialize the cart as an empty array
        $_SESSION['cart'] = array();
    }

    // check if the product is already in the cart
    $product_id = $_POST['product_id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    $item_already_in_cart = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id) {
            // if it is, update the quantity
            $_SESSION['cart'][$key]['product_quantity'] += $product_quantity;
            $item_already_in_cart = true;
            break;
        }
    }

    // if it's not, add it to the cart
    if (!$item_already_in_cart) {
        $item = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_quantity' => $product_quantity
        );
        $_SESSION['cart'][] = $item;
    }

    // redirect to the cart page
    header('Location: shopping_cart.php');
    exit();
}

// display the contents of the cart
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        echo $item['product_name'] . ' - ' . $item['product_quantity'] . ' - ' . $item['product_price'] . '<br>';
    }
} else {
    echo 'Your cart is empty.';
}
?>
