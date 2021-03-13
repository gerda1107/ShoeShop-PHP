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

    public function getItemById($id)
    {

        $this->db->query("SELECT * FROM items WHERE item_id = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->singleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        }
        return false;
    }
}