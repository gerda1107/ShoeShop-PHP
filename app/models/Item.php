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

    public function addToCartDb($data) {
        $this->db->query("INSERT INTO cart (`item_id`, `title`, `price`, 'img', 'stock', 'user_id') VALUES (:item_id, :title, :price, :img, :stock, :user_id)");

        $this->db->bind(':item_id', $data['item_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':user_id', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sortLowestToHIghest()
    {
        $sql = "SELECT * FROM `items` ORDER BY `items`.`price` ASC";

        $this->db->query($sql);
        $result = $this->db->resultSet();

        return $result;
    }

    public function sortHighestToLowest()
    {
        $sql = "SELECT * FROM `items` ORDER BY `items`.`price` DESC";

        $this->db->query($sql);
        $result = $this->db->resultSet();

        return $result;
    }
}