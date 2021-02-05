
    <?php include("include/header.php"); ?>
    <?php
    $admins = $ad->selectAll("id, name, email","ORDER BY created_at DESC");
    ?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($admins as $i => $admin):?>
                      <tr>
                        <th scope="row"><?= $i + 1?></th>
                        <td><?= $admin['name'];?></td>
                        <td><?= $admin['email'];?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="<?=URL . "admin/handel/delet-category.php" . $admin['id'];?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="<?=URL . "admin/handel/delet-category.php" . $admin['id'];?>">
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