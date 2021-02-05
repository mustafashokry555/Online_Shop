
    <?php include("include/header.php"); ?>

    <?php if ($session->has('add-category')):?>
<div class='alert alert-success'>
    <p class='mb-0'>
        <?= $session->get("add-category"); ?>
    </p>
</div>
<?php endif; $session->remove('add-category');?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Category</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="<?=URL;?>admin/handel/add-category.php">
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
                              <input name='name' type="text" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?=URL . "admin/categories.php";?>">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <?php include("include/footer.php"); ?>