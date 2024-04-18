<?php
namespace App\Models;
use CodeIgniter\Model;
class AdminModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['username', 'password'];
    /**
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
    public function countTotalAdmin()
    {
        return $this->countAll();
    }
    public function getAllAdmin()
    {
        return $this->findAll();
    }
    public function getAdminById($id)
    {
        return $this->where('id_admin', $id)->first();
    }

    public function editAdmin($id)
    {
        return $this->update($id);
    }
    public function deleteAdmin($id)
    {
        return $this->delete($id);
    }

}
