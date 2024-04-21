<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\GaleriModel;

class GaleriController extends ProtectedController
{
    public function getAllgaleri()
    {
        $galeriModel = new GaleriModel();
        $allGaleri = $galeriModel->getAllGaleri();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/galeri', ['allGaleri' => $allGaleri]);
    }
    public function tambahGaleri()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahgaleri');
    }

    public function simpanGaleri()
    {
        $galeri = new GaleriModel();

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/galeri/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/galeri/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'img' => $fotoPath
        ];

        $galeri->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan galeri baru');
        return redirect('himatikadmin/galeri');
    }
    public function viewGaleri($id)
    {
        $galeriModel = new galeriModel();
        $galeri = $galeriModel->getgaleriById($id);

        if ($galeri) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editgaleri', ['galeri' => $galeri]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("galeri with ID {$id} not found");
        }
    }
    public function updateGaleri()
    {
        $galeriModel = new galeriModel();
        $id = $this->request->getVar('id_galeri');
        $galeri = $galeriModel->getGaleriById($id);


        if (!$galeri) {
            return redirect()->to('himatikadmin/galeri')->with('error', 'galeri tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_foto');
        $fotoPath = $galeri['img'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/galeri/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/galeri/' . $fotoName;
        }

        $data = [
            'judul' => $this->request->getVar('new_judul'),
            'deskripsi' => $this->request->getVar('new_deskripsi'),
            'img' => $fotoPath
        ];

        $galeriModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui galeri');
        return redirect('himatikadmin/galeri');
    }
    public function deletegaleri($id)
    {
        $galeriModel = new galeriModel();
        $galeri = $galeriModel->getgaleriById($id);
        if (!$galeri) {
            return redirect()->to('himatikadmin/galeri')->with('error', 'Data galeri tidak ditemukan');
        }
        $fotoPath = $galeri['foto'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($galeriModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data galeri');
        }
        return redirect()->to('himatikadmin/galeri');
    }
}
