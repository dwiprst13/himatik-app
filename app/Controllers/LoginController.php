<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserAuthModels;

class LoginController extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('admin/login');
    }
    public function userLogin()
    {
        echo view('templates/header');
        echo view('user/auth/login');
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
    public function authUser()
    {
        $session = session();
        $UserModel = new UserAuthModels();
        $login = $this->request->getPost('login');

        if ($login) {
            $user_username = $this->request->getVar('user_username');
            $user_password = $this->request->getVar('user_password');

            if (empty($user_username) || empty($user_password)) {
                session()->setFlashdata('error', "Silakan isi form inputan!");
                return redirect()->to('login');
            }

            $dataUser = $UserModel->where("username", $user_username)->first();

            if ($dataUser && password_verify($user_password, $dataUser['password'])) {
                echo "Login successful! Session data:<br>";
                print_r($dataUser);
                $dataSesi = [
                    'id_user' => $dataUser['id_user'],
                    'nama_user' => $dataUser['nama'],
                    'username_user' => $dataUser['username'],
                    'logged_in' => TRUE
                ];
                $session->set($dataSesi);
                echo "Session data set:<br>";
                print_r($_SESSION);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->to('/login');
            }
        }

        session()->setFlashdata('error', 'Error with your login details');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/himatikadmin/login');
    }
}
