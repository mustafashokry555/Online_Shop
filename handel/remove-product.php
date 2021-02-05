<?php

require_once("../app.php");
use Online\Classes\Models\Cart;
if($request->getHas('id'))
{
    $id = $request->get('id');
    $cart = new Cart;
    $cart->remove($id);

    header("location: " . URL . "cart.php");
}else{
    header("location: " . URL . "cart.php");

}

?>