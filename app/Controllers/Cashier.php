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
            'transactions' => $model->select('transactions.*, products.name, products.price')
                ->join('products', 'products.id = transactions.product_id')
                ->findAll(),
        ];
        if (!session()->has('id')) {
            return redirect()->to('/login');
        } else {
            return view('cashier/dashboard', $data);
        }
    }

    public function createPage()
    {
        $model = new Product();
        $data = [
            'products' => $model->findAll(),
            'title' => 'create'
        ];
        return view('cashier/createTransaction', $data);
    }

    public function store()
    {
        if (
            $this->validate([
                'product_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Product cannot be empty'
                    ]
                ],
                'quantity' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Quantity cannot be empty'
                    ]
                ],
            ])
        ) {
            $model = new Transaction();
            $productModel = new Product();

            $product_id = $this->request->getPost('product_id');
            $quantity = $this->request->getPost('quantity');

            $product = $productModel->find($product_id);

            $total = $product['price'] * $quantity;

            $data = [
                'product_id' => $product_id,
                'quantity' => $quantity,
                'total' => $total,
            ];

            $model->insert($data);
            return redirect()->to('/cashier/dashboard')->with('success', 'Data successfully saved');
        } else {
            return redirect()->to('/transaction/create')->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
