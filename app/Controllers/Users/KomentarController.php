<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\KomentarModel;
use App\Models\UserModels;

class KomentarController extends BaseController
{
    public function getAllKomentar()
    {
        $komentarModel = new KomentarModel();
        $allKomentar = $komentarModel->getAllKomentar();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/komentar', ['allKomentar' => $allKomentar]);
    }

    public function getKomentarById($id)
    {
    }
    public function getKomentarByArtikel()
    {
        $komentarModel = new KomentarModel();
        $komentarByArtikel = $komentarModel->getAllKomentar();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('Users/artikel_detail', ['komentarByArtikel' => $komentarByArtikel]);
    }

    public function saveKomentar()
    {
        $komentar = new KomentarModel();
        $id_artikel = $this->request->getVar('id_artikel');
        $data = [
            'id_artikel' => $this->request->getVar('id_artikel'),
            'id_user' => $this->request->getVar('id_user'),
            'parent_comment_id' => $this->request->getVar('parent_comentar_id'),
            'komentar' => $this->request->getVar('komentar'),
        ];
        $komentar->save($data);
        session()->setFlashdata('success', 'Berhasil menambahkan Admin baru');
        return redirect()->to('/artikel/' . $id_artikel);
    }
    public function deleteKomentar($id)
    {
        $komentarModel = new KomentarModel();
        $komentar = $komentarModel->getKomentarById($id);
        if (!$komentar) {
            return redirect()->to('himatikadmin/komentar')->with('error', 'Data komentar tidak ditemukan');
        }
        if ($komentarModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data komentar');
        }
        return redirect()->to('himatikadmin/komentar');
    }
}
