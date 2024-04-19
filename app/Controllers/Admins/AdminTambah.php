<?php

namespace App\Controllers\Admins;

use App\Models\AdminModel;
use App\Models\PengurusModel;
use App\Models\ArtikelModel;
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
        session()->setFlashdata('success', 'Berhasil menambahkan Admin baru');
        return redirect('himatikadmin/admin');
    }

    public function tambahPengurus()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahpengurus');
    }

    public function simpanPengurus()
    {
        $pengurus = new PengurusModel();

        $foto = $this->request->getFile('fotopengurus');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/fotopengurus/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/fotopengurus/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'nama' => $this->request->getVar('name'),
            'nama_panggilan' => $this->request->getVar('panggilan'),
            'nim' => $this->request->getVar('nim'),
            'divisi' => $this->request->getVar('divisi'),
            'posisi' => $this->request->getVar('posisi'),
            'ig_link' => $this->request->getVar('ig_link'),
            'linkedin_link' => $this->request->getVar('linkedin_link'),
            'github_link' => $this->request->getVar('github_link'),
            'foto' => $fotoPath
        ];

        $pengurus->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan pengurus baru');
        return redirect('himatikadmin/pengurus');
    }
    public function tambahArtikel()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahartikel');
    }
    public function simpanArtikel()
    {
        $artikel = new ArtikelModel();

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/artikel/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/artikel/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'content' => $this->request->getVar('isi'),
            'tag' => $this->request->getVar('tag'),
            'status' => $this->request->getVar('status'),
            'author' => $this->request->getVar('author'),
            'img' => $fotoPath
        ];

        $artikel->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan artikel baru');
        return redirect('himatikadmin/artikel');
    }
}
