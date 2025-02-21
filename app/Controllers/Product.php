<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product as ModelProduct;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $model = new ModelProduct();
        $product = $model->select('products.*, categories.name')->join('categories', 'categories.id = products.category_id')->findAll();
        $data = [
            'title' => 'Product',
            'products' => $product,
        ];
        if (!session()->has('id')) {
            return redirect()->to('login');
        } else {
            return view('product/list', $data);
        }
    }

    public function createPage()
    {
        $model = new Category();
        $categories = $model->findAll();
        $data = [
            'title' => 'Create',
            'categories' => $categories,
        ];
        if (!session()->has('id')) {
            return redirect()->to('login');
        } else {
            return view('product/create', $data);
        }
    }

    public function create()
    {
        helper('form');
        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name cannot be empty',
                    ],
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Description cannot be empty',
                    ],
                ],
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Category cannot be empty'
                    ],
                ],
                'price' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Price cannot be empty'
                    ],
                ],
                'stock' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Stock cannot be empty'
                    ],
                ],
            ])
        ) {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
            ];
            $model = new ModelProduct();
            $model->insert($data);

            return redirect()->to('product/list')->with('success', 'Data successfully created');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function updatePage($id)
    {
        $model = new ModelProduct();
        $categoryoModel = new Category();
        $data = [
            'title' => 'Update',
            'product' => $model->find($id),
            'categories' => $categoryoModel->findAll(),
        ];
        if (!session()->has('id')) {
            return redirect()->to('login');
        } else {
            return view('product/update', $data);
        }
    }

    public function update($id)
    {
        helper('form');
        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => 'Name cannot be empty',
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => 'Description cannot be empty',
                ],
                'category_id' => [
                    'rules' => 'required',
                    'errors' => 'Category cannot be empty',
                ],
                'price' => [
                    'rules' => 'required',
                    'errors' => 'Price cannot be empty',
                ],
                'stock' => [
                    'rules' => 'required',
                    'errors' => 'Stock cannot be empty',
                ],
            ])
        ) {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
            ];
            $model = new ModelProduct();
            $model->update($id, $data);

            return redirect()->to('product')->with('success', 'Data successfully updated');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $model = new ModelProduct();
        $product = $model->find($id);

        if ($product) {
            $model->delete($id);

            return redirect()->to('product/list')->with('success', 'Data successfully deleted');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not find');
        }
    }
}
