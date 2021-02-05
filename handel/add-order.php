<?php

require_once("../app.php");
use Online\Classes\Models\Cart;
use Online\Classes\Models\OrderDetails;
use Online\Classes\Models\Orders;
use Online\Classes\Validation\Validator;

$cart = new Cart;

if( $request->postHas('submit') and $cart->count() !== 0 ){

    $name = $request->post('name');
    $email = $request->post('email');
    $phone = $request->post('phone');
    $address = $request->post('address');
    

    //validation
    $validator = new Validator;
    $validator->validate('phone', $phone, ['required', 'str', 'max']);
    $validator->validate('name', $name, ['required', 'str', 'max']);
    if(!empty($email)){
        $validator->validate('email', $email, [ 'email', 'max']);
        $email = "'$email'";
    }else{
        $email = "NULL";
    }
    if(!empty($address)){
        $validator->validate('address', $address, [ 'str', 'max']);
        $address = "'$address'";
    }else{
        $address = "NULL";
    }
    

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "cart.php");
    }else{
        $orders = new Orders;
        $orderDetails = new OrderDetails;

        $orderId = $orders->insertAndGetId("name, email, phone, address", "'$name', $email, '$phone', $address");
        echo $orderId;
        foreach ($cart->allDAta() as $productId => $productData) {
            $qty = $productData["qty"];
            echo $qty;
            $orderDetails->insert("order_id , product_id , qty", "'$orderId', '$productId', '$qty'");
            print_r($productData);
        }
        $cart->emptyCart();
        header("location: " . URL . "products.php");
    }
    
}else{
    header("location: " . URL . "products.php");
}

?>