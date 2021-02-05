<?php

namespace Online\Classes\Models;

class Cart
{
    public function add(string $id, array $data)
    {
        $_SESSION['cart'][$id] = $data;
    }
    public function count()
    {
        return count($_SESSION['cart']);
    }
    public function total()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $productData) {
            $total += ($productData['qty'] * $productData['price']);
        };
        return $total;
    }

    public function remove(string $id )
    {
        unset($_SESSION['cart'][$id]);
    }

    public function has(string $id ):bool
    {
        return array_key_exists($id, $_SESSION['cart']);
    }

    public function allData()
    {
        return $_SESSION['cart'];
    }
    public function emptyCart()
    {
        $_SESSION['cart'] = [];
    }

}
?>