<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function createPage()
    {
        return view('product/create');
    }

    public function create()

}
