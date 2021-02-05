<?php
require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\Models\Cats;

if($request->postHas('submit'))
{
    $id = $request->post('id');

    $name = $request->post('name');

    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/admin/edit-category.php?id=$id");
    }else{
        $c = new Cats;
        $c->update("name = '$name'", $id);
        $session->set('edit-category', 'the category updated successfully');
    }


    header("location: " . URL . "admin/edit-category.php?id=$id");
}else{
    header("location: " . URL . "admin/edit-category.php?id=$id");
}

?>