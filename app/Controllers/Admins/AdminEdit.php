<?php

namespace App\Controllers\Admins;

use App\Controllers\ProtectedController;
use App\Models\AdminModel;

class AdminEdit extends ProtectedController
{
    public function viewAdmin($id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminById($id);

        if ($admin) {
            echo view('templates/header');
            echo view('templates/sidebar');
            echo view('admin/edit/editadmin', ['admin' => $admin]);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Admin with ID {$id} not found");
        }
    }
}