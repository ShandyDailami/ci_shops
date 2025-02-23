<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;
use CodeIgniter\HTTP\ResponseInterface;

class Cashier extends BaseController
{
    public function dashboard()
    {
        $model = new Transaction();
        $data = [
            'title' => 'Dashboard',
            'transactions' => $model->findAll(),
        ];
        if (!session()->has('id')) {
            return redirect()->to('/login');
        } else {
            return view('cashier/dashboard', $data);
        }
    }

    public function createPage()
    {
        return view('cashier/createTransaction', ['title' => 'create']);
    }
}
