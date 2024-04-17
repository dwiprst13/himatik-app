<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_admin', 'password']; 

    public function checkLogin($id_admin, $password)
    {
        $admin = $this->where('id_admin', $id_admin)->first();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                return $admin;
            }
        }

        return false;
    }
}
