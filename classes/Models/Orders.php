<?php

namespace Online\Classes\Models;

use Online\Classes\DB;

class Orders extends DB
{
    public function __construct()
    {
        $this->table = "orders";
        $this->connect();
    }

    
    public function selectAlll(string $fields = "*") :array
    {
        $sql = "SELECT $fields 
        FROM orders JOIN order_details JOIN products
        ON orders.id = order_details.order_id
        AND order_details.product_id = products.id
        GROUP BY orders.id
        ORDER BY orders.created_at";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    
}


?>