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

    public function Items()
    {
        $items = $this->itemModel->getItems();

        header('Content-Type: application/json');
        echo json_encode($items);
    }

    public function ascOrder()
    {
        $ascItems = $this->itemModel->sortLowestToHIghest();

        header('Content-Type: application/json');
        echo json_encode($ascItems);
    }

    public function descOrder()
    {
        $descItems = $this->itemModel->sortHighestToLowest();

        header('Content-Type: application/json');
        echo json_encode($descItems);
    }

    public function item($id = null)
    {
        if (ifRequestIsPost() && ifUserIsLoggedIn()) {
            $specItem = $this->itemModel->getItemById($id);

            $data = [
                'itemInfo' => $specItem,
                'user_id' => $_SESSION['user_id'],
            ];
        } else {
            $specItem = $this->itemModel->getItemById($id);
            $data = [
                'itemInfo' => $specItem,
            ];
            $this->view('items/item', $data);
        }
    }

    public function addToCart() {

        $btnName = $_POST['addToCartBtn'];
        $id = $_POST['item_id'];

        if(ifRequestIsPost() && $btnName === 'add' && ifUserIsLoggedIn()) {
            $data = $this->itemModel->getItemById($id);

            $this->itemModel->addToCartDb($id);
        }
    }
}