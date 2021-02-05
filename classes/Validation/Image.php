<?php

namespace Online\Classes\Validation;

class Image implements ValidationRule
{
    public function check(string $name, $value)
    {
        $allowExt = ['png', 'jpg', 'jpeg', 'gif'];
        $ext = pathinfo($value["name"], PATHINFO_EXTENSION);
        if(! in_array($ext, $allowExt)){
            return "$name extension is not allowed, please upload jpg, png, jpeg, or gif";
        }
        
        return false;
    }
}

?>