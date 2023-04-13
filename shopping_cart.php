<?php
session_start();

include 'productsheader.php';
include 'add_to_cart.php';

if (isset($_SESSION['cart'])) {
    $cart_items = array();
    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $cart_item = array(
            "name" => $product['name'],
            "price" => $product['price'],
            "quantity" => 1
        );
        array_push($cart_items, $cart_item);
        $total += $product['price'];
    }
    $cart_data = array(
        "items" => $cart_items,
        "total" => $total
    );
    $_SESSION['cart_data'] = $cart_data;
}
?>

<body class="bg-light">
    <div class="container pt-5">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6 class="mt-5">My cart</h6>
                    
                    <form action="add_to_cart.php" method="post" class="cart-items">
                        <?php foreach ($_SESSION['cart'] as $product_id => $product) {
                            echo "<script>console.log('objekta vertiba: " . $product . "')</script>"; ?>
                            <div class="border-rounded">
                                <div class="row mt-4 mb-4 bg-white">
                                    <div class="col-md-3">
                                        <img src="<?php echo $row['photolocation']; ?>" alt="product image" class="img-fluid">
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="pt-2"><?php echo $product['name']; ?></h5>
                                        <small class="text-secondary"><?php echo $product['shortinfo']; ?></small>
                                        <h5 class="pt-2"><?php echo $product['price']; ?></h5>
                                        <button type="submit" class="btn btn-danger px-2" name="remove" value="<?php echo $product_id; ?>">Remove</button>
                                    </div>
                                    <div class="col-md-6 py-5">
                                        <div>
                                            <button type="button" class="btn bg-light "><i class="fas fa-minus"></i></i></button>
                                            <input type="text" value="1" class="form-control w-25 d-inline">
                                            <button type="button" class="btn bg-light d-inline"><i class="fas fa-plus"></i></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Price details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            $total_items = 0;
                            foreach ($_SESSION['cart'] as $product_id => $product) {
                                $total_items++;
                            }
                            echo "<h6>Price ($total_items items)</h6>";
                            ?>
                            <h6>Delivery charge</h6>
                            <hr>
                            <h6>Amount payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo $total; ?></h6
