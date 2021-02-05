<?php

require_once("../../app.php");
use Online\Classes\Validation\Validator;
use Online\Classes\Models\Admin;

if($request->postHas('submit'))
{
    $email = $request->post('email');
    $password = $request->post('password');
    
    //validation
    $validator = new Validator;

    $validator->validate('email', $email, ['required', 'email', 'str', 'max']);
    $validator->validate('password', $password, ['required', 'str', 'max']);
  
        
    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        header("location: " . URL . "admin/login.php");
    }else{
        $ad = new Admin;
        $isLogin = $ad->login($email, $password, $session);
        if( $isLogin === true)
        {
            header("location: " . URL . "admin/index.php"); 
        }else{
            $session->set("errors", [$isLogin]);
            header("location: " . URL .  "admin/login.php");
        }
    }
    
}else{
    header("location: " . URL .  "admin/login.php");
}
?>