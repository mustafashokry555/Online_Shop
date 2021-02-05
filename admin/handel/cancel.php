<?php
require_once("../../app.php");
use Online\Classes\Models\Orders;

$ord = new Orders;
if($request->getHas('id'))
{
    $id = $request->get('id');
    $ord->update("status = 'canceled'", $id);
}
header("location: " . URL . "admin/order.php?id=" . $id);


?>