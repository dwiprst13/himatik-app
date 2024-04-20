<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\PengurusModel;

class PengurusController extends ProtectedController
{
    public function getAllPengurus()
    {
        $pengurusModel = new PengurusModel();
        $allPengurus = $pengurusModel->getAllPengurus();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/pengurus', ['allPengurus' => $allPengurus]);
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
