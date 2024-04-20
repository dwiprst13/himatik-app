<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\GaleriModel;
use App\Models\PengurusModel;

class DAshboardController extends ProtectedController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $artikelModel = new ArtikelModel();
        $pengurusModel = new PengurusModel();
        $galeriModel = new GaleriModel();
        $totalAdmin = $adminModel->countTotalAdmin();
        $totalArtikel = $artikelModel->countTotalArtikel();
        $totalPengurus = $pengurusModel->countTotalPengurus();
        $totalGaleri = $galeriModel->countTotalGaleri();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/dashboard', [
            'totalAdmin' => $totalAdmin,
            'totalArtikel' => $totalArtikel,
            'totalPengurus' => $totalPengurus,
            'totalGaleri' => $totalGaleri
        ]);
    }
}
