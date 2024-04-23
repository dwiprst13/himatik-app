<?php

namespace App\Controllers;

use App\Models\AdminModel;

class LoginController extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('admin/login');
    }
    public function lupapassword()
    {
        echo view('templates/header');
        echo view('admin/lupapassword');
    }

    public function auth()
    {
        $session = session();
        $AdminModel = new AdminModel();
        $login = $this->request->getPost('login');

        if ($login) {
            $admin_username = $this->request->getVar('admin_username');
            $admin_password = $this->request->getVar('admin_password');

            if (empty($admin_username) || empty($admin_password)) {
                session()->setFlashdata('error', "Silakan isi form inputan!");
                return redirect()->to('login');
            }

            $dataAdmin = $AdminModel->where("username", $admin_username)->first();

            if ($dataAdmin && password_verify($admin_password, $dataAdmin['password'])) {
                echo "Login successful! Session data:<br>";
                print_r($dataAdmin);
                $dataSesi = [
                    'id_admin' => $dataAdmin['id_admin'],
                    'nama_admin' => $dataAdmin['nama'],
                    'username_admin' => $dataAdmin['username'],
                    'role' => $dataAdmin['role'],
                    'logged_in' => TRUE
                ];
                $session->set($dataSesi);
                echo "Session data set:<br>";
                print_r($_SESSION);
                return redirect()->to('/himatikadmin/dashboard');
            } else {
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->to('/himatikadmin/login');
            }
        }

        session()->setFlashdata('error', 'Error with your login details');
        return redirect()->to('/himatikadmin/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/himatikadmin/login');
    }
}
