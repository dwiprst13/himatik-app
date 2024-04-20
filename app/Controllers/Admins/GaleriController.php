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
    public function viewgaleri($id)
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
    public function updategaleri()
    {
        $galeriModel = new galeriModel();
        $id = $this->request->getVar('id_galeri');
        $galeri = $galeriModel->find($id);


        if (!$galeri) {
            return redirect()->to('himatikadmin/galeri')->with('error', 'galeri tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_fotogaleri');
        $fotoPath = $galeri['foto'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/fotogaleri/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/fotogaleri/' . $fotoName; // update dengan path baru
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
