<?php

namespace Online\Classes\Models;

use Online\Classes\DB;

class OrderDetails extends DB
{
    public function __construct()
    {
        $this->table = "order_details";
        $this->connect();
    }

    public function selectIdd($id, string $fields = "*") :array
    {
        $sql = "SELECT $fields
        FROM order_details JOIN products
        ON order_details.product_id = products.id
        WHERE order_details.order_id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}


?>