<?php

require_once("../app.php");
use Online\Classes\Models\Cart;
if($request->postHas('submit'))
{
    $id = $request->post('id');
    $name = $request->post('name');
    $img = $request->post('img');
    $price = $request->post('price');
    $qty = $request->post('qty');
    

    $peoductData = [
        'name' => $name,
        'img' => $img,
        'price' => $price,
        'qty' => $qty
    ];

    $cart = new Cart;
    $cart->add($id, $peoductData);

    header("location: " . URL . "products.php");
}else{
    header("location: " . URL . "products.php");
}

?>