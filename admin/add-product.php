<?php include("include/header.php"); 

    $cats = $c->selectAll("id, name");

?>

<?php if ($session->has('add-product')):?>
<div class='alert alert-success'>
    <p class='mb-0'>
        <?= $session->get("add-product"); ?>
    </p>
</div>
<?php endif; $session->remove('add-product');?>


<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Add Product</h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?=URL;?>admin/handel/add-product.php" enctype="multipart/form-data">
                        <?php
							if($session->has('errors')):
							?>
                        <div class="alert alert-danger">
                            <?php foreach ($session->get('errors') as $error) :?>
                            <p class='mb-0'>
                                <?= $error; ?>
                            </p>
                            <?php endforeach; $session->remove("errors");?>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cat-id">
                                <?php foreach($cats as $cat): ?>
                                <option value="<?=$cat['id'];?>"><?=$cat['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input type="number" name="pieces" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc" rows="3"></textarea>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="img" id="file-upload" class="custom-file-input" id="customFile">
                            <labe id="file-name" class="custom-file-label" for="customFile">Choose Image</labe>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?=URL;?>admin/products.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("include/footer.php"); ?>