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
        $latestArtikel = $artikelModel->getLatestArtikel();

        $galeriModel = new GaleriModel();
        $latestGaleri = $galeriModel->getLatestGaleri();
        
        echo view('templates/header_user');
        echo view('user/header');
        echo view('user/banner');
        echo view('user/about', ['allPengurus' => $allPengurus]);
        echo view('user/pengurus');
        echo view('user/info');
        echo view('user/galeri', ['latestGaleri' => $latestGaleri]);
        echo view('user/artikel', ['latestArtikel' => $latestArtikel]);
        echo view('user/kontak');
        echo view('user/footer');
    }
    
}
