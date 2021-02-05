<?php
require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\File;
use Online\Classes\Models\Product;

if($request->postHas('submit'))
{
    $name = $request->post('name');
    $catId = $request->post('cat-id');
    $price = $request->post('price');
    $pieces = $request->post('pieces');
    $desc = $request->post('desc');
    $img = $request->files('img');
    
    //validation
    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('category', $catId, ['required', 'numeric']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('pieces numder', $pieces, [ 'required', 'numeric']);
    $validator->validate('descreption', $desc, [ 'required', 'str']);
    $validator->validate('image', $img, [ 'requiredfile', 'image']);
    
  
        
    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/add-product.php");
    }else{

        $file = new File($img);
        $uploadName = $file->rename()->upload();

        $pr = new Product;
        $pr->insert("name, `desc`, price, pieces_no, img, cat_id ", "'$name', '$desc', '$price', '$pieces', '$uploadName', '$catId'");
        $session->set('add-product', 'the product added successfully');
        header("location: " . URL . "admin/add-product.php");
    }
    
}else{
    header("location: " . URL . "admin/add-product.php");
}

?>