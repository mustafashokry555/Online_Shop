<?php

namespace Online\Classes\Validation;

interface ValidationRule
{
    public function check(string $name, $value);
}
?>