<?php include("include/header.php"); ?>


<?php
    $products = $pr->selectAlll("products.id AS productId, products.name AS productName, products.created_at AS productCreat,
                                img, price, pieces_no, cats.name AS catName");
    ?>
<?php if ($session->has('delet-product')):?>
<div class='alert text-center alert-success'>
    <p class='mb-0'>
        <?= $session->get("delet-product"); ?>
    </p>
</div>
<?php endif; $session->remove('delet-product');?>


<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Products</h3>
                <a href="<?=URL . "admin/add-product.php";?>" class="btn btn-success">
                    Add new
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $i => $product):?>
                    <tr>
                        <th scope="row"><?= $i + 1?></th>
                        <td><?= $product['productName'];?></td>
                        <td><?= $product['catName'];?></td>
                        <td>
                            <img height="50px" src="<?= URL ."uploads/" . $product['img'];?>" alt="">
                        </td>
                        <td><?= $product['pieces_no'];?></td>
                        <td>$<?= $product['price'];?></td>
                        <td><?= date("d M,y h:i A", strtotime($product['productCreat']));?></td>
                        <td>
                            <!--<a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a>-->
                            <a class="btn btn-sm btn-info"
                                href="<?=URL . "admin/edit-product.php?id=" . $product['productId'];?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger"
                                href="<?=URL . "admin/handel/delet-product.php?id=" . $product['productId'];?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("include/footer.php"); ?>