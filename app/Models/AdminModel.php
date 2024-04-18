<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['username', 'password'];

    /**
     * Verifikasi username dan password dari database.
     *
     * @param string $username Username dari user yang ingin login.
     * @param string $password Password yang diinput oleh user.
     * @return mixed Returns array jika sukses, false jika gagal.
     */
    public function validateAdmin($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }
    /**
     * Menghitung total admin yang terdaftar.
     *
     * @return int Jumlah total admin.
     */
    public function countTotalAdmin()
    {
        return $this->countAll();
    }
}
