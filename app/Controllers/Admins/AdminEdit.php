<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;
use App\Models\PengurusModel;

class AdminEdit extends ProtectedController
{
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
    public function viewPengurus($id)
    {
        $pengurusModel = new PengurusModel();
        $pengurus = $pengurusModel->getPengurusById($id);

        if ($pengurus) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editpengurus', ['pengurus' => $pengurus]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pengurus with ID {$id} not found");
        }
    }
    public function updatePengurus()
    {
        $pengurusModel = new PengurusModel();
        $id = $this->request->getVar('id_pengurus');
        $pengurus = $pengurusModel->find($id);


        if (!$pengurus) {
            return redirect()->to('himatikadmin/pengurus')->with('error', 'Pengurus tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_fotopengurus');
        $fotoPath = $pengurus['foto'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/fotopengurus/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/fotopengurus/' . $fotoName; // update dengan path baru
        }

        $data = [
            'nama' => $this->request->getVar('new_name'),
            'nama_panggilan' => $this->request->getVar('new_panggilan'),
            'nim' => $this->request->getVar('new_nim'),
            'divisi' => $this->request->getVar('new_divisi'),
            'posisi' => $this->request->getVar('new_posisi'),
            'ig_link' => $this->request->getVar('new_ig_link'),
            'linkedin_link' => $this->request->getVar('new_linkedin_link'),
            'github_link' => $this->request->getVar('new_github_link'),
            'foto' => $fotoPath
        ];

        $pengurusModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui pengurus');
        return redirect('himatikadmin/pengurus');
    }
}
