<?php include("include/header.php"); 
    
    if($request->getHas('id') && $request->get('id') != ''){
        $catId = $request->get('id');
        $cat = $c->selectId($catId, "name");
        if (empty($cat)) {
            header("location: " . URL . "admin/categories.php"); 
        }
}else{
    header("location: " . URL . "admin/categories.php");
}

    ?>

<?php if ($session->has('edit-category')):?>
<div class='alert text-center alert-success'>
    <p class='mb-0'>
        <?= $session->get("edit-category"); ?>
    </p>
</div>
<?php endif; $session->remove('edit-category');?>



<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Category : <?= $cat['name'];?></h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?=URL;?>admin/handel/edit-category.php">
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
                            <?php endif; ?>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?= $cat['name'];?>" class="form-control">
                        </div>
                        <input name="id" hidden value="<?= $catId;?>">
                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?= URL . "admin/categories.php";?>">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include("include/footer.php"); ?>