<?php
require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\Models\Cats;

if($request->postHas('submit'))
{
    $name = $request->post('name');
    
    //validation
    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    
  
        
    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/add-category.php");
    }else{
        $c = new Cats;
        $c->insert("name ", "'$name'");
        $session->set('add-category', 'the category added successfully');
        header("location: " . URL . "admin/add-category.php");
    }
    
}else{
    header("location: " . URL . "admin/add-category.php");
}

?>