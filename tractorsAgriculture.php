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

<div class="container mt-3 pt-3  ">
    <div class="row">
        <?php foreach ($productstractors as $product) : ?>
        <div class="col-md-6 pb-4 d-flex">
            

                <div class="card-sl flex-row px-lg-4 pb-4 col-sm-10">


                    <div class="card-image img-thumbnail bg-black w-100">
                        <img src="<?php echo $product['photolocation'] ?>" />
                    </div>


                    <div class="card-heading"><?php echo $product['name'] ?></div>
                    <div class="card-text"><?php echo $product['shortinfo'] ?></div>
                    <div class="card-text"><?php echo $product['price'] ?> EIRO</div>
                    <a href="<?php echo $product['rentpage']?>" class="card-button bg-primary text-decoration-none">Rent</a>

                </div>
            

        </div>
        <?php endforeach ?>
    </div>
</div>



        <?php
        include 'footer.php' ?>