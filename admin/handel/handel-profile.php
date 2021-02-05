<?php

require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\Models\Admin;

if($request->postHas('submit'))
{
    $email = $request->post('email');
    $name = $request->post('name');
    $password = $request->post('password');
    $newPassword = $request->post('newPassword');
    $confirmPassword = $request->post('confirmPassword');
    
    //validation
    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('email', $email, ['required', 'email', 'max']);
    $validator->validate('password', $password, ['required', 'str', 'max']);
    $validator->validate('newPassword', $newPassword, [ 'str', 'max']);
    $validator->validate('confirmPassword', $confirmPassword, [ 'str', 'max']);
  
        
    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/profile.php");
    }else{
        $ad = new Admin;
        $edit = $ad->editProfile($name, $email, $password, $session, $newPassword, $confirmPassword);
            
            header("location: " . URL . "admin/profile.php");
    }
    
}else{
    header("location: " . URL . "admin/profile.php");
}
?>