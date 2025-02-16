<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Stmt\Return_;

class Category extends BaseController
{
    public function index()
    {
        $model = new ModelsCategory();
        $data = [
            'title' => 'Category',
            'categories' => $model->findAll(),
        ];

        return view('category/view', $data);
    }

    public function create()
    {
        helper('form');

        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => 'Category cannot be empty',
                ]
            ])
        ) {
            $data = [
                'name' => $this->request->getPost('name'),
            ];
            $model = new ModelsCategory();
            $model->insert($data);

            redirect()->to('category')->with('success', 'Category successfully saved');
        } else {
            redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function updatePage()
    {
        $id = $this->request->getPost('id');
        $model = new ModelsCategory();
        $data = [
            'title' => 'Update',
            'category' => $model->find($id),
        ];

        return view('category/update', $data);
    }

    public function update()
    {
        helper('form');
        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => 'Name cannot be empty',
                ]
            ])
        ) {
            $id = $this->request->getPost('id');
            $data = [
                'name' => $this->request->getPost('name'),
            ];
            $model = new ModelsCategory();
            $model->update($id, $data);

            return redirect()->to('category')->with('success', 'Category successfully updated');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $model = new ModelsCategory();
        $category = $model->find($id);

        if ($category) {
            $model->delete($id);

            return redirect()->to('category')->with('success', 'Category successfully deleted');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category not found');
        }
    }
}
