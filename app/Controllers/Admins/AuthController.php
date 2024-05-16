<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedControllerAdmin;

class AuthController extends ProtectedControllerAdmin
{
    public function login()
    {
        echo view('templates/header');
        echo view('admin/login');
        return redirect()->to('/AdminController/index');
    }
}