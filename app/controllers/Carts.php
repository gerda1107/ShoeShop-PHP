<?php

namespace app\controllers;

use app\libraries\Controller;
use app\models\Cart;

class Carts extends Controller
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new Cart;
    }

    public function cart()
    {
        $data = [];
        $this->view('carts/cart', $data);
    }
}
