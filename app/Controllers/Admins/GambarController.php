<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedControllerAdmin;
use App\Models\GambarModel;

class GambarController extends ProtectedControllerAdmin
{
    public function getAllGambar()
    {
        $gambarModel = new GambarModel();
        $allGambar = $gambarModel->getAllGambar();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/gambar', ['allGambar' => $allGambar]);
    }
    public function tambahGambar()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahgambar');
    }

    public function simpanGambar()
    {
        $gambar = new GambarModel();

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/gambar/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/gambar/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'img' => $fotoPath
        ];

        $gambar->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan gambar baru');
        return redirect('himatikadmin/artikel/gambar');
    }
    public function viewGambar($id)
    {
        $gambarModel = new GambarModel();
        $gambar = $gambarModel->getGambarById($id);

        if ($gambar) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editgambar', ['gambar' => $gambar]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Gambar with ID {$id} not found");
        }
    }
    public function updateGambar()
    {
        $gambarModel = new GambarModel();
        $id = $this->request->getVar('id_gambar');
        $gambar = $gambarModel->getGambarById($id);

        if (!$gambar) {
            return redirect()->to('himatikadmin/artikel/gambar')->with('error', 'gambar tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_foto');
        $fotoPath = $gambar['img'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/gambar/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/gambar/' . $fotoName; 
        }

        $data = [
            'nama' => $this->request->getVar('new_nama'),
            'img' => $fotoPath
        ];

        $gambarModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui gambar');
        return redirect('himatikadmin/artikel/gambar');
    }
    public function deleteGambar($id)
    {
        $gambarModel = new GambarModel();
        $gambar = $gambarModel->getGambarById($id);
        if (!$gambar) {
            return redirect()->to('himatikadmin/gambar')->with('error', 'Data gambar tidak ditemukan');
        }
        $fotoPath = $gambar['img'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($gambarModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data gambar');
        }
        return redirect()->to('himatikadmin/artikel/gambar');
    }
}
