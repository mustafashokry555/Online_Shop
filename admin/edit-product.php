<?php include("include/header.php"); ?>

<?php if ($session->has('edit-product')):?>
<div class='alert alert-success text-center'>
    <p class='mb-0'>
        <?= $session->get("edit-product"); ?>
    </p>
</div>
<?php endif; $session->remove('edit-product');?>
<?php
    if($request->getHas('id') && $request->get('id') != ''){
        $productId = $request->get('id');
        $cats = $c->selectAll("id, name");
        $product = $pr->selectId($productId, "name, cat_id, price, pieces_no, `desc`, img");
        if (empty($product)) {
            header("location: " . URL . "admin/products.php");    
        }
    }else{
        header("location: " . URL . "admin/products.php");
    }
    ?>


<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Product : <?= $product['name'];?></h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?=URL;?>admin/handel/edit-product.php" enctype="multipart/form-data">
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
                            <input name="name" type="text" value="<?= $product['name'];?>" class="form-control">
                        </div>
                        <input hidden name="id" value="<?=$productId;?>">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                <?php foreach($cats as $cat): ?>
                                <option value="<?=$cat['id'];?>"
                                    <?php if($cat['id'] == $product['cat_id']){echo "selected";}?>><?=$cat['name'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" value="<?= $product['price'];?>" type="number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input name="pieces" value="<?= $product['pieces_no'];?>" type="number"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="desc" class="form-control" rows="3"><?= $product['desc'];?></textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-center"><img
                                src="<?=URL;?>uploads/<?=$product['img'];?>" height="100px"></div>
                        <div class="custom-file">
                            <input id="file-upload" type="file" name="img" class=" custom-file-input" id="customFile">
                            <label id="file-name" class="overflow-hidden custom-file-label" for="customFile">Choose
                                Image</label>
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