<?php

namespace app\models;

use app\libraries\Database;

class Item
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}