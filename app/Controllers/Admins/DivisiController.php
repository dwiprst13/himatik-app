<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\DivisiModel;

class DivisiController extends ProtectedController
{
    public function getAllDivisi()
    {
        $divisiModel = new DivisiModel();
        $allDivisi = $divisiModel->getAllDivsi();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/divisi', ['allDivisi' => $allDivisi]);
    }
    public function tambahAdmin()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahadmin');
    }
    public function simpanAdmin()
    {

    }
    public function viewAdmin($id)
    {
        
    }
    public function updateAdmin()
    {

    }
    public function deleteAdmin($id)
    {
        $divisiModel = new DivisiModel();
        if ($divisiModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('himatikadmin/admin');
        }
    }
}
