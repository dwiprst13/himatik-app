<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;

class AdminController extends ProtectedController
{
    public function getAllAdmin()
    {
        $adminModel = new AdminModel();
        $allAdmin = $adminModel->getAllAdmin();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/admin', ['allAdmin' => $allAdmin]);
    }
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
        session()->setFlashdata('success', 'Berhasil menambahkan Admin baru');
        return redirect('himatikadmin/admin');
    }
    public function viewAdmin($id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminById($id);

        if ($admin) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editadmin', ['admin' => $admin]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Admin with ID {$id} not found");
        }
    }
    public function updateAdmin()
    {
        $adminModel = new AdminModel();

        $id_admin = $this->request->getVar('id_admin');
        $nama = $this->request->getVar('new_name');
        $username = $this->request->getVar('new_username');
        $nim = $this->request->getVar('new_nim');
        $email = $this->request->getVar('new_email');
        $role = $this->request->getVar('new_role');
        $password = $this->request->getVar('new_password');
        $repassword = $this->request->getVar('new_repassword');
        $admin = $adminModel->find($id_admin);

        if (!$admin) {
            return redirect()->back()->withInput()->with('error', 'Admin tidak ditemukan.');
        }

        if (!empty($password)) {
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
        } else {
            $hashedPassword = $admin['password'];
        }

        $data = [
            'nama' => $nama,
            'username' => $username,
            'nim' => $nim,
            'email' => $email,
            'role' => $role,
            'password' => $hashedPassword,
        ];

        $adminModel->update($id_admin, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui data Admin.');
        return redirect()->to('himatikadmin/admin');
    }
    public function deleteAdmin($id)
    {
        $adminModel = new AdminModel();
        if ($adminModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('himatikadmin/admin');
        }
    }
}