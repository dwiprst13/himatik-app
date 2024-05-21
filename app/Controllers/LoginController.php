<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModels;

class LoginController extends BaseController
{
    public function adminLogin()
    {
        echo view('templates/header');
        echo view('admin/login');
    }
    public function userLogin()
    {
        $session = session();
        if ($session->has('id_user')) {
            return redirect()->to('/')->with('alert', 'Mau Ngapain Sih Brooooo???');
        } else {
            echo view('templates/header');
            echo view('user/auth/login');
        }
    }
    public function userLoginReq()
    {
        echo view('templates/header');
        echo view('user/auth/login');
    }
    public function register()
    {
        $session = session();
        if ($session->has('id_user')) {
            return redirect()->to('/')->with('alert', 'Mau daftar pinjol kah? Kok mau daftar lagi segala');
        } else {
            echo view('templates/header');
            echo view('user/auth/register');
        }
    }
    public function userRegister()
    {
        $user = new UserModels();
        $username = $this->request->getVar('namapengguna');
        $password = $this->request->getVar('password');
        $repassword = $this->request->getVar('repassword');
        if ($user->where('username', $username)->first()) {
            return redirect()->back()->withInput()->with('error', 'Username sudah dipakai. Silakan gunakan username lain.');
        }
        if ($password !== $repassword) {
            return redirect()->back()->withInput()->with('error', 'Password dan Konfirmasi Password tidak sesuai.');
        }
        if (strlen($password) < 6) {
            return redirect()->back()->withInput()->with('error', 'Password harus terdiri dari minimal 6 karakter.');
        }
        if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            return redirect()->back()->withInput()->with('error', 'Password harus mengandung kombinasi angka dan huruf.');
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $username,
            'email' => $this->request->getVar('email'),
            'password' => $hashedPassword,
        ];
        $user->save($data);
        session()->setFlashdata('success', 'Berhasil membuat akun baru. Silahkan Login dengan akun anda');
        return redirect('login');
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
    public function userAuth()
    {
        $session = session();
        $UserModel = new UserModels();
        $login = $this->request->getPost('login');

        if ($login) {
            $user_username = $this->request->getVar('namapengguna');
            $user_password = $this->request->getVar('password');

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
                    'foto_user' => $dataUser['foto'],
                    'rating_user' => $dataUser['rating'],
                    'logged_in' => TRUE
                ];
                $session->set($dataSesi);
                echo "Session data set:<br>";
                print_r($_SESSION);
                return redirect()->to('');
            } else {
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->to('login');
            }
        }

        session()->setFlashdata('error', 'Error with your login details');
        return redirect()->to('login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function logoutUser()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('');
    }
}
