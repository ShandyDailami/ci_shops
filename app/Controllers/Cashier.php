<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cashier extends BaseController
{
    public function dashboard()
    {
        return view('cashier/dashboard');
    }
}
