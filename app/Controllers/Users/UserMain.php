<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\InfoModel;
use App\Models\KomentarModel;
use App\Models\PengurusModel;
use App\Models\ArtikelModel;
use App\Models\GaleriModel;
use App\Models\UserModels;

class UserMain extends BaseController
{
    public function index()
    {
        session();
        $pengurusModel = new PengurusModel();
        $allPengurus = $pengurusModel->getAllPengurus();
        $artikelModel = new ArtikelModel();
        $latestArtikel = $artikelModel->getLatestArtikel();
        $infoModel = new InfoModel();
        $latestInfo = $infoModel->getLatestInfo();
        $galeriModel = new GaleriModel();
        $latestGaleri = $galeriModel->getLatestGaleri();

        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/pages/index', [
            'allPengurus' => $allPengurus,
            'latestInfo' => $latestInfo,
            'latestGaleri' => $latestGaleri,
            'latestArtikel' => $latestArtikel
        ]);
        echo view('user/footer');
    }
    public function login()
    {
        echo view('templates/header_user');
        echo view('user/auth/login');
    }
    public function artikel()
    {
        $artikelModel = new ArtikelModel();
        $searchPost = $this->request->getVar('searchPost');

        if (!empty($searchPost)) {
            $allArtikel = $artikelModel->searchArtikel($searchPost);
        } else {
            $allArtikel = $artikelModel->getAllArtikel();
        }

        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/pages/artikel', [
            'allArtikel' => $allArtikel,
            'searchPost' => $searchPost
        ]);
        echo view('user/footer');
    }

    public function getAllArtikel()
    {
        $artikelModel = new ArtikelModel();
        $allArtikel = $artikelModel->getAllArtikel();
        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/pages/artikel', ['allArtikel' => $allArtikel]);
        echo view('user/footer');
    }

    public function getArtikelByTag($tag)
    {
        $artikelModel = new ArtikelModel();

        return view('artikel_by_tag', compact('allArtikel'));
    }
    public function detailArtikel($id)
    {
        $artikelModel = new ArtikelModel();
        $komentarModel = new KomentarModel();
        $userModel = new UserModels();

        $artikel = $artikelModel->getArtikelById($id);
        $allArtikel = $artikelModel->getAllArtikel();
        $getKomentar = $komentarModel->getKomentarByIdArtikel($artikel['id_artikel']);
        $listArtikelByTag = $artikelModel->where('tag', 'like')->findAll();

        $id_users = array_map(function ($komentar) {
            return $komentar['id_user'];
        }, $getKomentar);

        $userKomentar = [];
        if (!empty($id_users)) {
            $userKomentar = $userModel->getDataUserKomentarById($id_users);
        }

        $komentarLengkap = [];
        foreach ($getKomentar as $komentar) {
            $user = array_filter($userKomentar, function ($user) use ($komentar) {
                return $user['id_user'] == $komentar['id_user'];
            });
            $user = reset($user);
            $komentarLengkap[] = [
                'id_komentar' => $komentar['id_komentar'],
                'id_artikel' => $komentar['id_artikel'],
                'id_user' => $komentar['id_user'],
                'komentar' => $komentar['komentar'],
                'date_posted' => $komentar['date_posted'],
                'parent_comment_id' => $komentar['parent_comment_id'],
                'status' => $komentar['status'],
                'nama_user' => $user['nama'] ?? 'Unknown',
                'foto_user' => $user['foto_user'] ?? 'default.png'
            ];
        }

        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/artikel/artikel_detail', [
            'artikel' => $artikel,
            'allArtikel' => $allArtikel,
            'getKomentar' => $komentarLengkap,
            'listArtikel' => $listArtikelByTag
        ]);
        echo view('user/footer');
    }


    public function galeri()
    {
        $galeriModel = new GaleriModel();
        $allGaleri = $galeriModel->getAllGaleri();
        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/pages/galeri', ['allGaleri' => $allGaleri]);
        echo view('user/footer');
    }
    public function detailGaleri()
    {
        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/galeri/galeri');
        echo view('user/footer');
    }
    public function ruangHimatik()
    {
        echo view('templates/header_user');
        echo view('user/ruanghimatik/ruanghimatik');
    }
    public function getAllKomentar()
    {
        $komentarModel = new KomentarModel();
        $komentar = $komentarModel->getAllKomentar();
    }

    public function postComent()
    {
    }
}
