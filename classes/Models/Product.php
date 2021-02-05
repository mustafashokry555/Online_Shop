<?php

namespace Online\Classes\Models;

use Online\Classes\DB;

class Product extends DB
{
    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }
    public function selectIdd($id, string $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table JOIN cats 
        ON $this->table.cat_id = cats.id 
        WHERE $this->table.id = $id LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function selectAlll(string $fields = "*") :array
    {
        $sql = "SELECT $fields FROM $this->table JOIN cats
        ON $this->table.cat_id = cats.id 
        ORDER BY $this->table.created_at DESC";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //update query
    public function updateCat(string $set, string $where) :bool
    {
        $sql = "UPDATE $this->table SET  $set WHERE cat_id = $where";
        return mysqli_query($this->conn, $sql);
    }

}


?>