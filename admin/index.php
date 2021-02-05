
    <?php include("include/header.php");
    
    $productsCount = $pr->count();
    $ordersCount = $ord->count();
    $catsCount = $c->count();
?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $productsCount;?></h5>
                          <a href="<?=URL;?>admin/products.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $catsCount;?></h5>
                          <a href="<?=URL;?>admin/categories.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $ordersCount;?></h5>
                          <a href="<?=URL;?>admin/orders.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include("include/footer.php"); ?>