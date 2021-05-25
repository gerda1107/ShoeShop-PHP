<?php

namespace app\models;

use app\libraries\Database;

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addToCart($data)
    {
        $this->db->query("INSERT INTO cart (`item_id`, `title`, `price`, `rating`, `img`, `stock`, `user_id`) VALUES (:item_id, :title, :price, :rating, :img, :stock, :user_id)");

        $this->db->bind(':item_id', $data['item_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':user_id', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
