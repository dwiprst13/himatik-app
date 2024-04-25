<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\ProkerModel;

class ProkerController extends ProtectedController
{
    public function getAllProker()
    {
        $prokerModel = new ProkerModel();
        $allProker = $prokerModel->getAllProker();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/proker', ['allProker' => $allProker]);
    }
    public function tambahProker()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahproker');
    }

    public function simpanProker()
    {
        $proker = new ProkerModel();

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/proker/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/proker/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'date' => $this->request->getVar('date'),
            'divisi' => $this->request->getVar('divisi'),
            'img' => $fotoPath
        ];

        $proker->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan proker baru');
        return redirect('himatikadmin/proker');
    }
    public function viewProker($id)
    {
        $prokerModel = new ProkerModel();
        $proker = $prokerModel->getProkerById($id);

        if ($proker) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editproker', ['proker' => $proker]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("proker with ID {$id} not found");
        }
    }
    public function updateProker()
    {
        $prokerModel = new ProkerModel();
        $id = $this->request->getVar('id_proker');
        $proker = $prokerModel->getProkerById($id);


        if (!$proker) {
            return redirect()->to('himatikadmin/proker')->with('error', 'proker tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_foto');
        $fotoPath = $proker['img'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/proker/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/proker/' . $fotoName;
        }

        $data = [
            'judul' => $this->request->getVar('new_judul'),
            'deskripsi' => $this->request->getVar('new_deskripsi'),
            'img' => $fotoPath
        ];

        $prokerModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui proker');
        return redirect('himatikadmin/proker');
    }
    public function deleteProker($id)
    {
        $prokerModel = new ProkerModel();
        $proker = $prokerModel->getProkerById($id);
        if (!$proker) {
            return redirect()->to('himatikadmin/proker')->with('error', 'Data proker tidak ditemukan');
        }
        $fotoPath = $proker['img'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($prokerModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data proker');
        }
        return redirect()->to('himatikadmin/proker');
    }
}
