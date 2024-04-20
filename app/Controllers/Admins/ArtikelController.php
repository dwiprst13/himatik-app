<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\ArtikelModel;

class ArtikelController extends ProtectedController
{
    public function getAllArtikel()
    {
        $artikelModel = new ArtikelModel();
        $allArtikel = $artikelModel->getAllArtikel();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/artikel', ['allArtikel' => $allArtikel]);
    }
    public function getArtikelById($id)
    {
        $artikelModel = new ArtikelModel();
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
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->getArtikelById($id);

        if ($artikel) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/detail/detailartikel', ['artikel' => $artikel]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Admin with ID {$id} not found");
        }
    }
    public function tambahArtikel()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahartikel');
        echo view('admin/tools/artikelspecialscript');
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
            'writer' => $this->request->getVar('writer'),
            'img' => $fotoPath
        ];

        $artikel->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan artikel baru');
        return redirect('himatikadmin/artikel');
    }
}
