<?php

// id_user	nama	username	email	password	

namespace App\Models;

use CodeIgniter\Model;

class UserAuthModels extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $allowedFields = [
        'nama',
        'username',
        'email',
        'password'
    ];

    public function validateUser($username, $password)
    {
        $user = $this->where('username', $username)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
