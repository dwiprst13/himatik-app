<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\InfoModel;

class InfoController extends ProtectedController
{
    public function getAllInfo()
    {
        $infoModel = new InfoModel();
        $allInfo = $infoModel->getAllinfo();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/info', ['allInfo' => $allInfo]);
    }
    public function tambahInfo()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahinfo');
    }

    public function simpanInfo()
    {
        $info = new InfoModel();

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/info/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/info/' . $fotoName;
        } else {
            $fotoPath = '';
        }

        $data = [
            'detail' => $this->request->getVar('detail'),
            'img' => $fotoPath
        ];

        $info->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan info baru');
        return redirect('himatikadmin/info');
    }
    public function viewinfo($id)
    {
        $infoModel = new infoModel();
        $info = $infoModel->getInfoById($id);

        if ($info) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editinfo', ['info' => $info]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("info with ID {$id} not found");
        }
    }
    public function updateInfo()
    {
        $infoModel = new infoModel();
        $id = $this->request->getVar('id_info');
        $info = $infoModel->getInfoById($id);


        if (!$info) {
            return redirect()->to('himatikadmin/info')->with('error', 'info tidak ditemukan.');
        }

        $foto = $this->request->getFile('new_foto');
        $fotoPath = $info['img'];

        if ($foto->isValid() && !$foto->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/info/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($fotoPath && file_exists(FCPATH . $fotoPath)) {
                unlink(FCPATH . $fotoPath);
            }

            $fotoName = $foto->getRandomName();
            $foto->move($uploadDir, $fotoName);
            $fotoPath = 'uploads/info/' . $fotoName; 
        }

        $data = [
            'detail' => $this->request->getVar('new_detail'),
            'img' => $fotoPath
        ];

        $infoModel->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui info');
        return redirect('himatikadmin/info');
    }
    public function deleteInfo($id)
    {
        $infoModel = new InfoModel();
        $info = $infoModel->getInfoById($id);
        if (!$info) {
            return redirect()->to('himatikadmin/info')->with('error', 'Data info tidak ditemukan');
        }
        $fotoPath = $info['img'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
        if ($infoModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data info');
        }
        return redirect()->to('himatikadmin/info');
    }
}
