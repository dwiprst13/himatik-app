<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\PengaturanModel;

class PengaturanController extends ProtectedController
{
    public function getAllPengaturan()
    {
        $artikelModel = new PengaturanModel();
        $allArtikel = $artikelModel->getAllArtikel();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/artikel', ['allArtikel' => $allArtikel]);
    }
    public function getArtikelById($id)
    {
        $artikelModel = new PengaturanModel();
        $artikel = $artikelModel->getArtikelById($id);

        if ($artikel) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editartikel', ['artikel' => $artikel]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Admin with ID {$id} not found");
        }
    }
    public function detailArtikel($id)
    {
    }
    public function viewArtikel($id)
    {
    }
    public function tambahArtikel()
    {
    }
    public function simpanArtikel()
    {
    }
    public function updateArtikel()
    {
    }
    public function deleteArtikel($id)
    {

        return redirect()->to('himatikadmin/artikel');
    }
}
