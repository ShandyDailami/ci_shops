<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
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

    public function store()
    {
        $model = new Transaction();
        $productModel = new Product();

        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        $product = $productModel->find($product_id);

        $total = ($product['price'] * $quantity);

        $data = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total' => $total,
        ];

        $model->insert($data);
        return redirect()->to('/cashier/dashboard');
    }
}
