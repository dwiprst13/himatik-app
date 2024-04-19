<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;
use App\Models\PengurusModel;

class AdminHapus extends ProtectedController
{
    public function deleteAdmin($id)
    {
        $adminModel = new AdminModel();
        if ($adminModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('himatikadmin/admin');
        }
    }
    public function deletePengurus($id)
    {
        $pengurusModel = new PengurusModel();
        $pengurus = $pengurusModel->getPengurusById($id);
        if (!$pengurus) {
            return redirect()->to('himatikadmin/pengurus')->with('error', 'Data pengurus tidak ditemukan');
        }
        $fotoPath = $pengurus['foto'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($pengurusModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data pengurus');
        }
        return redirect()->to('himatikadmin/pengurus');
    }
}
