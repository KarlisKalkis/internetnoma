<?php include 'config/connectionproducts.php';
include 'productsheader.php';


// Get the product ID from the URL parameter
$product_id = $_GET['id'];


// Prepare the SQL query to retrieve the product information
$sql = "SELECT * FROM products WHERE id = '$product_id'";

// Execute the SQL query
$result = $conn->query($sql);
?>


<?php
//check if product that has been input is right inputed
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Invalid product ID";
}
?>

<div class="row gx-0 justify-content-center px-0">
    <div class="col-lg-6 p-0 bg-black">
        <img class="img-fluid " src="<?php echo $row['photolocation']?>">
    </div>
    <div class="col-lg-6 pt-5 order-lg-first">
        <div class="bg-white h-100 ">
            <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-lg-right justify-content-center">
                    <h4 class="text-black mt-3 text-center fw-bold"><?php echo $row['name']?></h4>
                    <p class="mb-0 mt-1 text-black text-center"><?php echo $row['shortinfo']?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gx-0 justify-content-center px-0">
    <div class="col-lg-12 pt-5 order-lg-first">
        <div class="bg-white h-100 ">
            <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-lg-right justify-content-center col-md-12 text-center">
                    <h5 class="mb-0 text-black ">Price: <?php echo $row['price']?> EIRO a day</h5>
                    <!--Table for rent start and rent end-->
                    <div class="container mt-4 mb-4">
                        <div class="input">
                            <span>Rent in</span>
                            <input type="date" name="" id="">
                        </div>


                        <div class="input mt-3">
                            <span>Rent end date</span>
                            <input type="date" name="" id="">
                        </div>
                    </div>

                    <button class="btn btn-primary col-12">Rent now</button>

                </div>
            </div>
        </div>
    </div>
</div>





<?php
$conn->close();
?>

<?php include 'mainpagestyles/footerindex.php' ?>