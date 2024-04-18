<?php

namespace App\Controllers\Admins;

use App\Models\AdminModel;
use App\Controllers\ProtectedController;

class AdminTambah extends ProtectedController
{
    public function tambahAdmin()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahadmin');
    }
    public function simpanAdmin()
    {
        $admin = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $repassword = $this->request->getVar('repassword');
        if ($admin->where('username', $username)->first()) {
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
            'nama' => $this->request->getVar('name'),
            'username' => $username,
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'password' => $hashedPassword,
        ];
        $admin->save($data);
        return redirect('himatikadmin/admin');
    }



}
