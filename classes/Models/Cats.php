<?php

namespace Online\Classes\Models;

use Online\Classes\DB;

class Cats extends DB
{
    public function __construct()
    {
        $this->table = "cats";
        $this->connect();
    }
}


?>