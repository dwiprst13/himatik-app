<?php

namespace App\Controllers;

class AdminMain extends BaseController
{
    public function login()
    {
        echo view('templates/header');
        echo view('admin/login');
        return redirect()->to('/AdminMain/index');
    }
    public function index()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/dashboard');
    }
    public function admin()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/admin');
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
