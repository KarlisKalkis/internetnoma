<?php include 'productsheader.php' ?>
<?php include 'config/dbcon.php' ?>


<div class="container mt-5 pt-5">
    <div class="row d-flex">
        <div class="col-md-12 text-center">
            <h2 class="text-white-50">Tractors that we provide</h1>
        </div>
    </div>
</div>

<?php


$sql = "SELECT * FROM productstractors ";
$stmtselect = $db->prepare($sql);
if ($stmtselect->execute()) {
    $productstractors = $stmtselect->fetchAll();
} else {
    echo 'there were errors saving data';
} ?>

<div class="container mt-3 p-5">
    <div class="row d-flex">
        <div class="col-md-12 pb-3">
            <?php foreach ($productstractors as $product) : ?>

                <div class="card-sl flex-row">


                    <div class="card-image img-thumbnail bg-black ">
                        <img src="<?php echo $product['photolocation'] ?>" />
                    </div>


                    <div class="card-heading"><?php echo $product['name'] ?></div>
                    <div class="card-text"><?php echo $product['shortinfo'] ?></div>
                    <div class="card-text"><?php echo $product['price'] ?></div>
                    <a href="products/9R390.html" class="card-button bg-primary text-decoration-none">Rent</a>

                </div>
            <?php endforeach ?>

        </div>



        <?php
        include 'footer.php' ?>