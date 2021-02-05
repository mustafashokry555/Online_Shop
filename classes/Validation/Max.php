<?php

namespace Online\Classes\Validation;

class Max implements ValidationRule
{
    public function check(string $name, $value)
    {
        if( strlen($value) > 255 )
            return "$name is too long";
        
        return false;
    }
}

?>