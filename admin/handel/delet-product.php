<?php
require_once("../../app.php");
use Online\Classes\Models\Product;

if($request->getHas('id')){
    $productId = $request->get('id');
    $pr = new Product;

    $imgName = $pr->selectId($productId, 'img')['img'];

    unlink(PATH . "uploads/$imgName");

    $pr->delete($productId);
    $session->set('delet-product', 'the product deleted successfully');
    header("location: " . URL . "admin/products.php");
}else{
    header("location: " . URL . "admin/products.php");
}

?>