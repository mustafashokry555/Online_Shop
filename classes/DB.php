<?php

namespace Online\Classes;

abstract class DB
{
    protected $conn;
    protected string $table;

    public function connect()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "online shop");
    }

    //select querys
    public function selectAll(string $fields = "*", string $order = '') :array
    {
        $sql = "SELECT $fields FROM $this->table $order";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function selectId($id, string $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function selectwhere($conds, string $fields = "*") :array
    {
        $sql = "SELECT $fields FROM $this->table WHERE $conds";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function count() :int
    {
        $sql = "SELECT COUNT(*) AS cont FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result)['cont'];
    }

    //insert query
    public function insert(string $fields, string $values) :bool
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return mysqli_query($this->conn, $sql);
    }

    public function insertAndGetId(string $fields, string $values)
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        mysqli_query($this->conn, $sql);
        return mysqli_insert_id($this->conn);
    }

    //update query
    public function update(string $set, string $where) :bool
    {
        $sql = "UPDATE $this->table SET  $set WHERE id = $where";
        return mysqli_query($this->conn, $sql);
    }

    //delete query
    public function delete(string $where) :bool
    {
        $sql = "DELETE  FROM $this->table WHERE id =  $where";
        return mysqli_query($this->conn, $sql);
    }

}

?>