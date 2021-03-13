<?php

namespace app\controllers;

use app\libraries\Controller;
use app\models\Item;

class Items extends Controller
{
    private $itemModel;

    public function __construct()
    {
        $this->itemModel = new Item;
    }

    public function shop()
    {
        $data = [];
        $this->view('items/shop', $data);
    }
}