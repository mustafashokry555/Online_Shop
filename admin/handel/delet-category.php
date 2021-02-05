<?php
require_once("../../app.php");
use Online\Classes\Models\Cats;
use Online\Classes\Models\Product;

if($request->getHas('id') && $request->get('id') != '' && $request->get('id') != '100'){
    $catId = $request->get('id');

    $pr = new Product;
    $pr->updateCat("cat_id = '100'", $catId);

    $c = new Cats;
    $c->delete($catId);
    $session->set('delet-category', 'the category deleted successfully');

    header("location: " . URL . "admin/categories.php");
}else{
    header("location: " . URL . "admin/categories.php");
}

?>