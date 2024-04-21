<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\PengurusModel;
use App\Models\ArtikelModel;
use App\Models\GaleriModel;


class UserMain extends BaseController
{
    public function index()
    {
        $pengurusModel = new PengurusModel();
        $allPengurus = $pengurusModel->getAllPengurus();

        $artikelModel = new ArtikelModel();
        $allArtikel = $artikelModel->getAllArtikel();

        $galeriModel = new GaleriModel();
        $allGaleri = $galeriModel->getAllGaleri();
        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/banner');
        echo view('user/about');
        echo view('user/pengurus', ['allPengurus' => $allPengurus]);
        echo view('user/info');
        echo view('user/galeri', ['allGaleri' => $allGaleri]);
        echo view('user/artikel', ['allArtikel' => $allArtikel]);
        echo view('user/kontak');
        echo view('user/footer');
    }
    
}
