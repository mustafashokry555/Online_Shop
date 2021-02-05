<?php
require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\File;
use Online\Classes\Models\Product;

if($request->postHas('submit'))
{
    $id = $request->post('id');

    $name = $request->post('name');
    $catId = $request->post('cat_id');
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
    
    if($img['error'] == 0){
        $validator->validate('image', $img, ['image']);
    }   
        
    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/edit-product.php?id=".$id);
    }else{
        
        $pr = new Product;
        $imgName = $pr->selectId($id,'img')['img'];
        
        if($img['error'] == 0){
            unlink(PATH . "uploads/$imgName");
            $file = new File($img);
            $imgName = $file->rename()->upload(); 
        }

        $pr->update("name = '$name', `desc` = '$desc', price = $price, pieces_no = $pieces, img = '$imgName', cat_id = $catId", $id);
        
        $session->set('edit-product', 'the product updated successfully');
        header("location: " . URL . "admin/edit-product.php?id=".$id);
    }
    
}else{
    header("location: " . URL . "admin/edit-product.php?id=".$id);
}

?>