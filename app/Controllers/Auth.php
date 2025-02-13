<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        if (!session()->has('id')) {
            return redirect()->to('/login');
        }
    }
    public function loginPage()
    {
        return view('auth/login', ['title' => 'Login Page']);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new User();
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true,
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('cashier/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Incorrect username or password.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
