<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\PengurusModel;
use App\Models\GaleriModel;

class AdminMain extends ProtectedController
{
    public function login()
    {
        echo view('templates/header');
        echo view('admin/login');
        return redirect()->to('/AdminMain/index');
    }
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
    public function admin()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/admin');
    }
    public function getAllAdmin()
    {
        $adminModel = new AdminModel();
        $allAdmin = $adminModel->getAllAdmin();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/admin', ['allAdmin' => $allAdmin]);
    }

    public function pengurus()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/pengurus');
    }
    public function divisi()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/divisi');
    }
    public function proker()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/proker');
    }
    public function artikel()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/artikel');
    }
    public function galeri()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/galeri');
    }
    public function info()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/info');
    }
    public function pesan()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/pesan');
    }
}
