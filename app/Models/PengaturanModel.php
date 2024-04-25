<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table = 'main_data';
    protected $primaryKey = 'id_data';
    protected $allowedFields = [
        'nama_kabinet',
        'logo_himatik',
        'periode',
        'gambar_banner'
    ];

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getDataById($id)
    {
        return $this->where('id_data', $id)->first();
    }
    public function editData($id, array $data)
    {
        return $this->update($id, $data);
    }
    public function deleteData($id)
    {
        return $this->delete($id);
    }
}