<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Controllers\ProtectedControllerAdmin;
use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\GaleriModel;
use App\Models\PengurusModel;

class AdminMain extends ProtectedControllerAdmin
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
    public function getAllPengurus()
    {
        $pengurusModel = new PengurusModel();
        $allPengurus = $pengurusModel->getAllPengurus();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/pengurus', ['allPengurus' => $allPengurus]);
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
    public function getAllArtikel()
    {
        $artikelModel = new ArtikelModel();
        $allArtikel = $artikelModel->getAllArtikel();
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/artikel', ['allArtikel' => $allArtikel]);
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
