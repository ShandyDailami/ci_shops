<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as ModelProduct;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $model = new ModelProduct();
        $product = $model->select('product.*, category.name')->join('category', 'category.id = product.categpory_id')->findAll();
        $data = [
            'title' => 'Product',
            'products' => $product,
        ];
        return view('product/index', $data);
    }

    public function createPage()
    {
        return view('product/create', ['title' => 'Create']);
    }

    public function create()
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
            $model->insert($data);

            return redirect()->to('product')->with('success', 'Data successfully created');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function updatePage()
    {
        $id = $this->request->getPost('id');
        $model = new ModelProduct();
        $data = [
            'title' => 'Update',
            'product' => $model->find($id),
        ];
        return view('product/update', $data);
    }

    public function update()
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
            $id = $this->request->getPost('id');
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

            return redirect()->to('product')->with('success', 'Data successfully deleted');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not find');
        }
    }
}
