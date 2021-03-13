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

    public function getItems()
    {
        $sql = "SELECT * FROM items";

        $this->db->query($sql);
        $result = $this->db->resultSet();

        return $result;
    }
}