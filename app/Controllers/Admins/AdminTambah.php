<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;

class AdminTambah extends ProtectedController
{
    public function tambahAdmin()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('admin/tambah/tambahadmin');
    }
}
