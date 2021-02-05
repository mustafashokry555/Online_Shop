
    <?php include("include/header.php"); ?>

    <?php
                          if($session->has('editProfileMassege')):
                          ?>
                          <div class="alert alert-success">
                              <p class='mb-0 text-center'>
                                <?= $session->get('editProfileMassege'); ?>
                              </p>
                            <?php $session->remove("editProfileMassege");?>
                          </div>
                        <?php endif;?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Profile</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form action="<?=URL;?>admin/handel/handel-profile.php" method="POST">
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
                              <input type="text" name="name" value="<?=$session->get("adminName");?>" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" value="<?=$session->get("adminEmail");?>" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>New Password</label>
                              <input type="password" name="newPassword" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Confrim New Password</label>
                              <input type="password" name="confirmPassword" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Current Password</label>
                              <input type="password" name="password" class="form-control">
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?=URL;?>admin/index.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <?php include("include/footer.php"); ?>