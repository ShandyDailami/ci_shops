<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function dashboard()
    {
        if (!session()->has('id')) {
            return redirect()->to('/login');
        } else {
            return view('admin/dashboard', ['title' => 'Dashboard']);
        }
    }
}
