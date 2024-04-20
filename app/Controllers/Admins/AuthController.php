<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
class AuthController extends ProtectedController
{
    public function login()
    {
        echo view('templates/header');
        echo view('admin/login');
        return redirect()->to('/AdminController/index');
    }
}