<?php 
//session start
session_start();

include 'config/connectionproducts.php';
include 'add_to_cart.php';
include 'productsheader.php';




// Get the product ID from the URL parameter
$product_id = $_GET['id'];


// Prepare the SQL query to retrieve the product information
$sql = "SELECT * FROM products WHERE id = '$product_id'";

$products = array(
    array('$row[ID]', '$row[ID_Categorie]', '$row[price]' ),
);

// Execute the SQL query
$result = $conn->query($sql);

if (isset($_POST['add-to-cart'])) {
    if (isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert ('Service or product is already in processing')</script>";
            echo "<script>window.location = 'productgenerated_page.php?id=$product_id'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => (int)$_POST['product_id'],
                'name' =>  htmlspecialchars($_POST['name'])
            );

            $_SESSION['cart'][$count] = $item_array;
            
        }
    }else{
        $item_array = array(
            'product_id' => $_POST['product_id'],
            'name' =>$_POST['name']

        );

        //Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>


<?php
//check if product that has been input is right inputed
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Invalid product ID";
}
?>
<script src="store.js" async></script>


<div class="row gx-0 justify-content-center px-0">
    <div class="col-lg-6 p-0 bg-black">
        <img class="img-fluid " src="<?php echo $row['photolocation'] ?>">
    </div>
    <div class="col-lg-6 pt-5 order-lg-first">
        <div class="bg-white h-100 ">
            <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-lg-right justify-content-center">
                    <h4 class="text-black mt-3 text-center fw-bold"><?php echo $row['name'] ?></h4>
                    <p class="mb-0 mt-1 text-black text-center"><?php echo $row['shortinfo'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<form method="post">
    <div class="row gx-0 justify-content-center px-0">
        <div class="col-lg-12 pt-0 order-lg-first">
            <div class="bg-white h-100 ">
                <div class="d-flex h-100">
                    <div class="project-text w-100 my-auto text-lg-right justify-content-center col-md-12 text-center">
                        <h5 class="mb-0 mt-4 text-black" >Price: <?php echo $row['price'] ?> EIRO a day</h5>
                        <!--Table for rent start and rent end-->
                        <div class="container mt-4 mb-4">
                            <div class="input">
                                <span>Rent in</span>
                                <input type="date" name="rent-begin-date">
                            </div>


                            <div class="input mt-3">
                                <span>Rent end date</span>
                                <input type="date" name="rent-end-date">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark col-12" name="add-to-cart" id="add-to-cart">Rent now</button>
                        <input type="hidden" name='product_id' value="<?=$row['ID']?>">

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>





<?php
$conn->close();
?>

<?php include 'mainpagestyles/footerindex.php' ?>