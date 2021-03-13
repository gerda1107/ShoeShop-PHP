<?php

namespace app\controllers;

use app\libraries\Controller;

class Pages extends Controller
{
    public function index()
    {
        $data = [];
        $this->view('pages/index', $data);

        if (ifRequestIsPost()) {
            redirect('/items/shop');
        }
    }
}