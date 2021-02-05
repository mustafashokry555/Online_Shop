
    <?php include("include/header.php"); ?>
    <?php
    $cats = $c->selectAll("id, name, created_at","ORDER BY created_at DESC");
    ?>
    
    <?php if ($session->has('delet-category')):?>
<div class='alert text-center alert-success'>
    <p class='mb-0'>
        <?= $session->get("delet-category"); ?>
    </p>
</div>
<?php endif; $session->remove('delet-category');?>


    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Categories</h3>
                    <a href="<?=URL . "admin/add-category.php";?>" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cats as $i => $cat):?>
                      <tr>
                        <th scope="row"><?= $i + 1?></th>
                        <td><?= $cat['name'];?></td>
                        <td><?= date("d M,y h:i A", strtotime($cat['created_at']));?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="<?=URL . "admin/edit-category.php?id=" . $cat['id'];?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?php if($cat['id'] != '100') :?>
                            <a class="btn btn-sm btn-danger" href="<?=URL . "admin/handel/delet-category.php?id=" . $cat['id'];?>">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php endif;?>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
 <?php include("include/footer.php"); ?>