<?php namespace App\Controllers;

use App\Models\AdminModel;

class LoginController extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('admin/login');
    }

    public function login()
    {
        $session = session();
        $adminModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->validateAdmin($username, $password);
        if ($admin) {
            $sessionData = [
                'username' => $admin['username'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);
            return redirect()->to('/himatikadmin/dashboard');
        } else {
            $session->setFlashdata('error', 'Username atau password salah');
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}