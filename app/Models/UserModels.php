<?php	

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $allowedFields = [
        'nama',
        'username',
        'email',
        'password',
        'foto',
        'status',
        'rating'
    ];

    public function countTotalUser()
    {
        return $this->countAll();
    }
    public function getAllUser()
    {
        return $this->findAll();
    }
    public function getUserById($id)
    {
        return $this->where('id_user', $id)->first();
    }

    public function getDataUserKomentarById(array $id_user)
    {
        return $this->select('id_user, nama, foto')->whereIn('id_user', $id_user)->findAll();
    }

    public function editUser($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
