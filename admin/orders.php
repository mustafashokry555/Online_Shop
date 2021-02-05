
    <?php include("include/header.php"); ?>

    <?php
    $orders = $ord->selectAlll("orders.id AS id, orders.name AS name, orders.phone AS phone, status, orders.created_at AS time, SUM(qty*price) AS total ");
    ?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Orders</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $i => $order):?>
                      <tr>
                        <th scope="row"><?= $i + 1 ;?></th>
                        <td><?= $order["name"];?></td>
                        <td><?= $order["phone"];?></td>
                        <td>$<?= $order["total"];?></td>
                        <td><?= date("d M,y h:i A", strtotime($order["time"]));?></td>
                        <td><?= $order["status"];?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?=URL;?>admin/order.php?id=<?=$order['id'];?>">
                                <i class="fas fa-eye"></i>
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