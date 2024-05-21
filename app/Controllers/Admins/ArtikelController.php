<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Controllers\ProtectedControllerAdmin;
use App\Models\ArtikelModel;
use App\Models\GambarModel;

class ArtikelController extends ProtectedControllerAdmin
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
    public function viewArtikel($id)
    {
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->getArtikelById($id);

        if ($artikel) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editartikel', ['artikel' => $artikel]);
            echo view('admin/tools/artikelspecialscript');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("artikel with ID {$id} not found");
        }
    }
    public function tambahArtikel()
    {
        $gambarModel = new GambarModel();
        $gambar = $gambarModel->getAllGambar();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/gambarpopup', ['allGambar' => $gambar]);
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
            'author' => $this->request->getVar('penulis'),
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
    public function updateArtikel()
    {
        $artikelModel = new ArtikelModel();
        $id = $this->request->getVar('id_artikel');
        $artikel = $artikelModel->find($id);


        if (!$artikel) {
            return redirect()->to('himatikadmin/artikel')->with('error', 'Artikel tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_foto');
        $fotoPath = $artikel['img'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/artikel/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/artikel/' . $fotoName; 
        }

        $data = [
            'judul' => $this->request->getVar('new_judul'),
            'author' => $this->request->getVar('new_penulis'),
            'content' => $this->request->getVar('new_isi'),
            'tag' => $this->request->getVar('new_tag'),
            'status' => $this->request->getVar('new_status'),
            'edited_by' => $this->request->getVar('edited_by'),
            'edited' => date("Y-m-d H:i:s"),
            'img' => $fotoPath
        ];

        $artikelModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui artikel');
        return redirect('himatikadmin/artikel');
    }
    public function deleteArtikel($id)
    {
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->getArtikelById($id);
        if (!$artikel) {
            return redirect()->to('himatikadmin/artikel')->with('error', 'Data artikel tidak ditemukan');
        }
        $fotoPath = $artikel['img'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($artikelModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data artikel');
        }
        return redirect()->to('himatikadmin/artikel');
    }
}
