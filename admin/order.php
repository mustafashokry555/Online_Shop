
    <?php include("include/header.php"); ?>

   
<?php
    if($request->getHas('id') && $request->get('id') != ''){
        $orderId = $request->get('id');
        $order = $ord->selectId($orderId);
        $orderDetails = $ordD->selectIdd($orderId, "products.name AS name, qty, price, qty*price AS total");
        $total = 0; 
        if (empty($order)) {
            header("location: " . URL . "admin/orders.php");    
        }
    }else{
        header("location: " . URL . "admin/orders.php");
    }
    ?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : <?= $orderId;?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?= $order['name'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?= $order['email'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?= $order['phone'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?= $order['address'];?>t</td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?= date("d M,y h:i A", strtotime($order["created_at"]));?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td><?= $order['status'];?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($orderDetails as $detail):?>
                              <tr>
                                <td><?= $detail['name'];?></td>
                                <td><?= $detail['qty'];?></td>
                                <td>$<?= $detail['price'];?></td>
                              </tr>
                              <?php
                              $total += $detail['total'];
                              ?>
                              <?php endforeach;?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <?php if($order['status'] == 'pending'): ?>
                                    <th>Change Status</th>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>$<?= $total;?></td>
                                <?php if($order['status'] == 'pending'): ?>
                                <td>
                                    <a class="btn btn-success" href="<?=URL;?>admin/handel/approve.php?id=<?=$orderId?>">Approve</a>
                                    <a class="btn btn-danger"  href="<?=URL;?>admin/handel/cancel.php?id=<?=$orderId?>">Cancel</a>
                                </td>
                                <?php endif;?>

                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="<?=URL;?>admin/orders.php">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <?php include("include/footer.php"); ?>