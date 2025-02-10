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
            'title' => 'Main DOTA',
            'categories' => $model->findAll(),
        ];

        return view('category/index', $data);
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

            redirect()->to('category')->with('success', 'Data successfully saved');
        } else {
            redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
